from database import base


class DeliveryOrderDatabase(base.BaseDatabase):

    @staticmethod
    async def create_table():
        query = """CREATE TABLE IF NOT EXISTS delivery_order (
            ID              BIGSERIAL PRIMARY KEY NOT NULL,
            BUYER_ID        BIGINT NOT NULL,
            LOADER_ID       BIGINT,
            SELLER_ID       BIGINT,
            DESCRIPTION     TEXT NOT NULL,
            ADDRESS_FROM    VARCHAR(500) NOT NULL,
            ADDRESS_TO      VARCHAR(500) NOT NULL,
            STATUS          VARCHAR(50) NOT NULL DEFAULT 'new',
            PHOTO_DONE      TEXT,
            COMMENT_DONE    TEXT,
            CREATED_AT      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            TAKEN_AT        TIMESTAMP,
            IN_PROGRESS_AT  TIMESTAMP,
            DONE_AT         TIMESTAMP,
            FOREIGN KEY (BUYER_ID)  REFERENCES users (USER_ID),
            FOREIGN KEY (LOADER_ID) REFERENCES users (USER_ID),
            FOREIGN KEY (SELLER_ID) REFERENCES users (USER_ID)
        )"""
        await DeliveryOrderDatabase.query_database(DeliveryOrderDatabase(), query)

    @staticmethod
    async def create_order(buyer_id: int, description: str, address_from: str, address_to: str):
        """Покупатель создаёт заявку на отгрузку."""
        query = """INSERT INTO delivery_order (BUYER_ID, DESCRIPTION, ADDRESS_FROM, ADDRESS_TO)
                   VALUES (%s, %s, %s, %s) RETURNING ID"""
        result = await DeliveryOrderDatabase.query_database(
            DeliveryOrderDatabase(), query,
            (buyer_id, description, address_from, address_to)
        )
        return result[0][0] if result else None

    @staticmethod
    async def get_open_orders():
        """Список открытых заявок для грузчика (статус new)."""
        query = """SELECT d.*, u.NAME as buyer_name
                   FROM delivery_order d
                   JOIN users u ON d.BUYER_ID = u.USER_ID
                   WHERE d.STATUS = 'new'
                   ORDER BY d.CREATED_AT DESC"""
        return await DeliveryOrderDatabase.query_database(DeliveryOrderDatabase(), query)

    @staticmethod
    async def take_order(order_id: int, loader_id: int):
        """Грузчик берёт заявку."""
        query = """UPDATE delivery_order
                   SET STATUS = 'taken', LOADER_ID = %s, TAKEN_AT = CURRENT_TIMESTAMP
                   WHERE ID = %s AND STATUS = 'new'
                   RETURNING ID"""
        result = await DeliveryOrderDatabase.query_database(
            DeliveryOrderDatabase(), query, (loader_id, order_id)
        )
        return bool(result)

    @staticmethod
    async def start_order(order_id: int, loader_id: int):
        """Грузчик начинает выполнение."""
        query = """UPDATE delivery_order
                   SET STATUS = 'in_progress', IN_PROGRESS_AT = CURRENT_TIMESTAMP
                   WHERE ID = %s AND LOADER_ID = %s AND STATUS = 'taken'
                   RETURNING ID"""
        result = await DeliveryOrderDatabase.query_database(
            DeliveryOrderDatabase(), query, (order_id, loader_id)
        )
        return bool(result)

    @staticmethod
    async def complete_order(order_id: int, loader_id: int, photo_path: str, comment: str):
        """Грузчик завершает заявку с фото и комментарием."""
        query = """UPDATE delivery_order
                   SET STATUS = 'done',
                       PHOTO_DONE = %s,
                       COMMENT_DONE = %s,
                       DONE_AT = CURRENT_TIMESTAMP
                   WHERE ID = %s AND LOADER_ID = %s AND STATUS = 'in_progress'
                   RETURNING ID, BUYER_ID"""
        result = await DeliveryOrderDatabase.query_database(
            DeliveryOrderDatabase(), query, (photo_path, comment, order_id, loader_id)
        )
        return result[0] if result else None

    @staticmethod
    async def cancel_order(order_id: int, buyer_id: int):
        """Покупатель отменяет заявку (только если ещё не взята)."""
        query = """UPDATE delivery_order
                   SET STATUS = 'cancelled'
                   WHERE ID = %s AND BUYER_ID = %s AND STATUS = 'new'
                   RETURNING ID"""
        result = await DeliveryOrderDatabase.query_database(
            DeliveryOrderDatabase(), query, (buyer_id, order_id)
        )
        return bool(result)

    @staticmethod
    async def get_orders_for_loader(loader_id: int):
        """Активные и завершённые заявки конкретного грузчика."""
        query = """SELECT d.*, u.NAME as buyer_name
                   FROM delivery_order d
                   JOIN users u ON d.BUYER_ID = u.USER_ID
                   WHERE d.LOADER_ID = %s
                   ORDER BY d.CREATED_AT DESC"""
        return await DeliveryOrderDatabase.query_database(
            DeliveryOrderDatabase(), query, (loader_id,)
        )

    @staticmethod
    async def get_orders_for_buyer(buyer_id: int):
        """История заявок покупателя."""
        query = """SELECT d.*, u.NAME as loader_name
                   FROM delivery_order d
                   LEFT JOIN users u ON d.LOADER_ID = u.USER_ID
                   WHERE d.BUYER_ID = %s
                   ORDER BY d.CREATED_AT DESC"""
        return await DeliveryOrderDatabase.query_database(
            DeliveryOrderDatabase(), query, (buyer_id,)
        )

    @staticmethod
    async def get_order_by_id(order_id: int):
        """Получить одну заявку по ID."""
        query = """SELECT * FROM delivery_order WHERE ID = %s"""
        result = await DeliveryOrderDatabase.query_database(
            DeliveryOrderDatabase(), query, (order_id,)
        )
        return result[0] if result else None
