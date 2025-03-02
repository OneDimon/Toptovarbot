import database.base as base
from database.request_response_seller.exceptions import *
from datetime import datetime, timedelta


# таблица с полями
# id - id запроса ключ
# id_buyer - id покупателя
# id_seller - id продавца
# status - статус запроса
# name_product - название товара
# model_product - модель товара
# respone - ответ
# date_request - дата запроса



class RequestResponseSellerDatabase(base.BaseDatabase):
    """
    Класс для работы с базой данных запросов-ответов. 
    """

    async def create_table_request_response_seller(self)->None:
        """
        Создает таблицу для хранения данных запросов-ответов для продавцов в базе данных.
        Эта функция не принимает параметры и ничего не возвращает.
        """
        query = """CREATE TABLE IF NOT EXISTS request_response_seller 
        (
            ID BIGSERIAL PRIMARY KEY NOT NULL,
            DATE_REQUEST TIMESTAMP NOT NULL,
            ID_BUYER BIGINT NOT NULL,
            ID_SELLER BIGINT NOT NULL,
            STATUS VARCHAR(50),
            LINK_PHOTO VARCHAR(1000),
            CATEGORY VARCHAR(100),
            NAME_PRODUCT VARCHAR(100),
            RESPONSE VARCHAR(100),
            DATE_NEXT_REQUEST TIMESTAMP,
            HASH_REQUEST VARCHAR(100),
            FOREIGN KEY (ID_BUYER) REFERENCES users(USER_ID),
            FOREIGN KEY (ID_SELLER) REFERENCES users(USER_ID),
            FOREIGN KEY (CATEGORY) REFERENCES categories_product (CATEGORY_three)

        )"""
        await self.query_database(query)

    async def create_table_response_seller(self)->None:
        """
        Создает таблицу для хранения данных ответов продавцов в базе данных.
        Эта функция не принимает параметры и ничего не возвращает.
        """
        query = """CREATE TABLE IF NOT EXISTS response_seller 
        (
            ID BIGSERIAL PRIMARY KEY NOT NULL,
            ID_SELLER BIGINT NOT NULL,
            LINK_PHOTO VARCHAR(1000),
            NAME_PRODUCT VARCHAR(100),
            PRICE VARCHAR(100),
            HASH_RESPONSE VARCHAR(100),
            QUANTITY_PRODUCT VARCHAR(100)
        )"""
        await self.query_database(query)

    async def set_request_seller(self, arParams: dict)->None:
        try:
            await self.__validation_data_request_seller(arParams)
            await self.__adding_query_database_request_seller(arParams)
        except Exception as e:
            print(e)

    async def get_ready_response(self, id_seller: int, name_product: str, date_request: str)->None|dict:
        query = f"""SELECT response, date_next_request FROM request_response_seller
                 WHERE ID_SELLER = {id_seller} 
                 AND NAME_PRODUCT = '{name_product}'
                 AND DATE(DATE_NEXT_REQUEST) > '{date_request}'
                 AND STATUS = 'отвечено'
                 ORDER BY DATE_REQUEST DESC
                 LIMIT 1"""
        result = await self.query_database(query)
        if (len(result) > 0):
            return result[0]
        else:
            return None
 
    async def set_auto_request(self, response_db: list, query_seller: dict)->None:
        id_buyer = query_seller['id_buyer']
        id_seller = query_seller['id_seller']
        name_product = query_seller['name_product']
        date_request = query_seller['date_request']
        category = query_seller['category']
        photo = query_seller['photo']
        date_next_request = response_db[1]
        response = response_db[0]
        status = 'отвечено'
        qyery = f"""INSERT INTO request_response_seller
        (
            ID_BUYER,
            ID_SELLER,
            NAME_PRODUCT,
            DATE_REQUEST,
            DATE_NEXT_REQUEST,
            RESPONSE,
            STATUS,
            CATEGORY,
            LINK_PHOTO
        )
        VALUES
        (
            '{id_buyer}',
            '{id_seller}',
            '{name_product}',
            '{date_request}',
            '{date_next_request}',
            '{response}',
            '{status}',
            '{category}',
            '{photo}'
        )"""
        await self.query_database(qyery)

    async def get_respnse_in_progress(self, id_seller: int):
        query = f"""SELECT * FROM request_response_seller
                 WHERE ID_SELLER = {id_seller} 
                 AND STATUS = 'в обработке'
                 ORDER BY DATE_REQUEST DESC
                 LIMIT 1"""
        result = await self.query_database(query)
        return result
    
    async def get_request_info_fields(self, id_seller: int):
        from database.categories_product import CategoriesProductDatabase
        product_and_datetime_request = await self.get_request_info_request(id_seller)
        if (product_and_datetime_request == None):
            return None
        
        category_all = await CategoriesProductDatabase.get_three_categories(product_and_datetime_request[4])
        product = product_and_datetime_request[0]
        datetime_request = product_and_datetime_request[1]
        request_id = product_and_datetime_request[2]
        photo = product_and_datetime_request[3]

        
        return {'product': product, 'categoy_all': category_all, 'datetime_request': datetime_request, 'photo': photo, 'request_id': request_id}

    async def set_response_no_product(self, request_id: int):
        date_next_request = (datetime.now() + timedelta(days=2)).strftime('%Y-%m-%d %H:%M:%S')
        query = f"""UPDATE request_response_seller SET STATUS = 'отвечено', DATE_NEXT_REQUEST = '{date_next_request}', RESPONSE = 'нет такого продукта'  WHERE ID = {request_id}"""
        await self.query_database(query)

    async def set_request_status_in_progress(self, request_id: int):
        query = f"""UPDATE request_response_seller SET STATUS = 'в обработке' WHERE ID = {request_id}"""
        await self.query_database(query)
        
    async def set_response_await_product(self, request_id: int, duration_await_day: int):
        date_next_request = (datetime.now() + timedelta(days=duration_await_day)).strftime('%Y-%m-%d %H:%M:%S')
        query = f"""UPDATE request_response_seller SET STATUS = 'отвечено', DATE_NEXT_REQUEST = '{date_next_request}', RESPONSE = 'ожидание продукта' WHERE ID = {request_id}"""
        await self.query_database(query)

    async def __validation_data_request_seller(self, arParams: dict)->None: 
        if 'id_buyer' not in arParams or arParams['id_buyer'] == None or type(arParams['id_buyer']) != int:
            raise ExcetionIdBuyerNotFound
        if 'id_seller' not in arParams or arParams['id_seller'] == None or type(arParams['id_seller']) != int:
            raise ExcetionIdSellerNotFound
        if 'name_product' not in arParams or arParams['name_product'] == None or type(arParams['name_product']) != str:
            raise  ExcetionNameProductNotFound
        if 'date_request' not in arParams or arParams['date_request'] == None or type(arParams['date_request']) != str:
            raise  ExceptionDateRequestNotFound


    async def __adding_query_database_request_seller(self, arParams: dict)->None:
        query = f"""INSERT INTO request_response_seller
        (
            ID_BUYER,
            ID_SELLER,
            NAME_PRODUCT,
            DATE_REQUEST,
            STATUS,
            HASH_REQUEST,
            CATEGORY,
            LINK_PHOTO
        )
        VALUES
        (
            '{arParams['id_buyer']}',
            '{arParams['id_seller']}',
            '{arParams['name_product']}',
            '{arParams['date_request']}',
            'не отвечено',
            '{arParams['hash_request']}',
            '{arParams['category']}',
            '{arParams['photo']}'
        )"""
        
        await self.query_database(query)

    async def get_request_info_request(self, id_seller: int):
        current_date = datetime.now()
        fifteen_minutes_ago = current_date - timedelta(minutes=15)
        query = f"""SELECT name_product, date_request, id, link_photo, category 
                FROM request_response_seller 
                WHERE id_seller = {id_seller} 
                AND DATE_REQUEST > '{fifteen_minutes_ago.strftime('%Y-%m-%d %H:%M:%S')}'
                ORDER BY DATE_REQUEST DESC
                LIMIT 1"""
        result = await self.query_database(query)
        if len(result) > 0:
            return result[0]
        else:
            return None
            
    async def get_request_info_category_all(self, category: str):
        query = f"""SELECT category_a, category_b, category_c FROM category_database WHERE category_c = '{category}'"""
        result = await self.query_database(query)
        if (len(result) > 0):
            return result[0]
        else:
            return None

    async def set_response_goods_seller(self, response_hash: str, response: dict, id_seller: int):
        query_updatee_request = f"""UPDATE request_response_seller SET RESPONSE = '{response_hash}'"""
        query_add_respons = f"""INSERT INTO response_seller (LINK_PHOTO, NAME_PRODUCT, PRICE, HASH_RESPONSE, ID_SELLER, QUANTITY_PRODUCT) VALUES
                                                     ('{response['photo']}', '{response['name']}', '{response['price']}', '{response_hash}', {id_seller}, '{response['quantity']}')"""
        
        await self.query_database(query_updatee_request)
        await self.query_database(query_add_respons)

    async def set_respons_finish_seller(self, request_id: int):
        date_next_request = (datetime.now() + timedelta(days=3)).strftime('%Y-%m-%d %H:%M:%S')
        query = f"""UPDATE request_response_seller SET STATUS = 'отвечено', DATE_NEXT_REQUEST = '{date_next_request}' WHERE ID = {request_id}"""
        await self.query_database(query)

    async def get_seller_survey(self, id_seller: int):
        date = datetime.now().strftime('%Y-%m-%d')
        query = f"""SELECT * FROM request_response_seller WHERE ID_SELLER = {id_seller} AND DATE(date_request) = '{date}'"""
        result = await self.query_database(query)
        return result
