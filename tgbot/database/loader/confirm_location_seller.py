from database import base


class ConfirmLocationSellerDatabase(base.BaseDatabase):

    @staticmethod
    async def create_table_confirm_location_seller() -> None:
        """
        Создает таблицу для хранения данных подтверждений местоположений продавцов в базе данных.
        Таблица определена в миграции update_system/migrations/16032025_create_confirm_location_seller.sql
        Эта функция не принимает параметры и ничего не возвращает.
        """
        query = """CREATE TABLE IF NOT EXISTS confirm_location_seller
                  (ID BIGSERIAL PRIMARY KEY NOT NULL,
                   SELLER_ID BIGINT NOT NULL,
                   LOADER_ID BIGINT NOT NULL,
                   CONFIRMIND_ID BIGINT,
                   TEXT_ADDRESS TEXT,
                   COMMENT_LOADER TEXT,
                   PHOTO VARCHAR(50),
                   DATE_CONFIRMED TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                   CHECKED BOOLEAN NOT NULL,
                   COMMENT_ADMIN TEXT,
                   FOREIGN KEY (SELLER_ID) REFERENCES users(USER_ID),
                   FOREIGN KEY (LOADER_ID) REFERENCES users(USER_ID),
                   FOREIGN KEY (CONFIRMIND_ID) REFERENCES users(USER_ID)
                   );"""
        
        await ConfirmLocationSellerDatabase.query_database(ConfirmLocationSellerDatabase(), query)

    @staticmethod
    async def get_seller_data(contact_or_name_seller: str) -> list:
        query = """SELECT 
                u.user_id AS id,
                u.city,
                u.subscription,
                u.date_of_registration,
                u.date_end_subscription,
                u.organization,
                u.name,
                u.offerta,
                u.tfone,
                c.contacts,
                c.contacts_type,
                l.name_of_place,
                l.sector,
                l.building,
                l.floar,
                l.line,
                l.place,
                l.address,
                l.photo,
                l.checked,
                l.checked_at
            FROM 
                public.users u
            LEFT JOIN 
                public.contacts c ON u.user_id = c.user_id
            LEFT JOIN 
                public.location l ON u.user_id = l.user_id
            WHERE 
                c.contacts = %s OR u.name = %s"""
        all_data = await ConfirmLocationSellerDatabase.query_database(
            ConfirmLocationSellerDatabase(), 
            query, 
            (contact_or_name_seller, contact_or_name_seller)
        )
        if not all_data:
            return None
        return all_data[0]
    
    @staticmethod
    async def add_confirm_location_seller(seller_id: int, loader_id: int, text_address: str, comment_loader: str, photo: str) -> None:
        """
        Добавляет новую запись о подтверждении местоположения продавца.
        
        :param seller_id: ID продавца
        :param loader_id: ID загрузчика
        :param text_address: Текстовый адрес
        :param comment_loader: Комментарий загрузчика
        :param photo: Идентификатор фото
        """
        query = """INSERT INTO confirm_location_seller 
                  (SELLER_ID, LOADER_ID, TEXT_ADDRESS, COMMENT_LOADER, PHOTO, CHECKED) 
                  VALUES 
                  (%s, %s, %s, %s, %s, FALSE)"""      
        await ConfirmLocationSellerDatabase.query_database(
            ConfirmLocationSellerDatabase(), 
            query, 
            (seller_id, loader_id, text_address, comment_loader, photo)
        )
    
    @staticmethod
    async def get_pending_confirmations(loader_id: int = None) -> list:
        """
        Получает список неподтвержденных местоположений продавцов.
        
        :param loader_id: ID загрузчика, если None - возвращаются все неподтвержденные местоположения
        :return: Список неподтвержденных местоположений
        """
        if loader_id:
            query = """SELECT * FROM confirm_location_seller 
                      WHERE LOADER_ID = %s AND CHECKED = FALSE 
                      ORDER BY DATE_CONFIRMED DESC"""
            return await ConfirmLocationSellerDatabase.query_database(
                ConfirmLocationSellerDatabase(), 
                query, 
                (loader_id,)
            )
        else:
            query = """SELECT * FROM confirm_location_seller 
                      WHERE CHECKED = FALSE 
                      ORDER BY DATE_CONFIRMED DESC"""
            return await ConfirmLocationSellerDatabase.query_database(
                ConfirmLocationSellerDatabase(), 
                query
            )
    
    @staticmethod
    async def check_confirmation(confirmation_id: int, checked: bool = True, confirmind_id: int = None, comment_admin: str = None) -> None:
        """
        Отмечает подтверждение местоположения продавца как проверенное.
        
        :param confirmation_id: ID подтверждения
        :param checked: True - проверено, False - не проверено
        :param confirmind_id: ID пользователя, подтвердившего местоположение
        :param comment_admin: Комментарий администратора
        """
        query = """UPDATE confirm_location_seller 
                  SET CHECKED = %s, CONFIRMIND_ID = %s, COMMENT_ADMIN = %s 
                  WHERE ID = %s"""
        await ConfirmLocationSellerDatabase.query_database(
            ConfirmLocationSellerDatabase(), 
            query, 
            (checked, confirmind_id, comment_admin, confirmation_id)
        )
    
    @staticmethod
    async def get_confirmation_by_id(confirmation_id: int) -> dict:
        """
        Get confirmation details by ID.
        
        :param confirmation_id: ID of the confirmation
        :return: Confirmation details or None if not found
        """
        query = """SELECT * FROM confirm_location_seller WHERE ID = %s"""
        result = await ConfirmLocationSellerDatabase.query_database(
            ConfirmLocationSellerDatabase(), 
            query, 
            (confirmation_id,)
        )
        return result[0] if result else None
    
    
    

