from database import base
from datetime import datetime

class CategoriesProductDatabase(base.BaseDatabase):

    @staticmethod
    async def create_table_categories_product()->None:
        """
        Создает таблицу для хранения данных категорий в базе данных.
        Эта функция не принимает параметры и ничего не возвращает.
        """
        query = """CREATE TABLE IF NOT EXISTS categories_product
        (
            ID BIGSERIAL PRIMARY KEY NOT NULL,
            CATEGORY_one VARCHAR(50),
            CATEGORY_two VARCHAR(50),
            CATEGORY_three VARCHAR(50)
        )"""

        await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)

    @staticmethod
    async def create_table_categories_search()->None:
        query = """CREATE TABLE IF NOT EXISTS categories_search 
        (
            ID BIGSERIAL PRIMARY KEY NOT NULL,
            CATEGORY TEXT NOT NULL,
            DATETIME DATE NOT NULL,
            USER_ID BIGINT NOT NULL,
            RESULT TEXT,
            LINK TEXT,
            FOREIGN KEY (CATEGORY) REFERENCES categories_product (CATEGORY_three),
            FOREIGN KEY (USER_ID) REFERENCES users (USER_ID)
        )"""
        await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)

    @staticmethod
    async def get_search_history_user(user_id: int, date: str) -> list:
        query = f"""SELECT * FROM categories_search WHERE USER_ID = {user_id} AND DATETIME = '{date}'"""
        return await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)

    @staticmethod
    async def create_category_product(category_one: str, category_two: str, category_three: str) -> None:
        query = f"""INSERT INTO categories_product (CATEGORY_one, CATEGORY_two, CATEGORY_three) VALUES ('{category_one}', '{category_two}', '{category_three}')"""
        await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)
    @staticmethod
    async def get_all_categories() -> list:
        query = """SELECT * FROM categories_product"""
        return await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)
    
    @staticmethod
    async def get_user_id_from_categories(category_one: str, category_two: str, category_three: str) -> list:
        query = f"""SELECT DISTINCT user_id FROM product WHERE category_three = '{category_three}'"""
        sellers_id = await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)
        if sellers_id:
            return sellers_id
        query = f"""SELECT DISTINCT user_id FROM product WHERE category = '{category_two}'"""
        sellers_id = await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)
        if sellers_id:
            return sellers_id
        query = f"""SELECT DISTINCT user_id FROM product WHERE category = '{category_one}'"""
        sellers_id = await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)
        return sellers_id

    @staticmethod
    async def set_result_search(user_id: int, category_three: str, result: str, hash: str) -> None:
        query = f"""INSERT INTO categories_search (CATEGORY, DATETIME, USER_ID, RESULT, LINK) VALUES ('{category_three.capitalize()}', '{datetime.now()}', {user_id}, '{result}', '{hash}')"""
        await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)

    @staticmethod
    async def get_three_categories(category: str) -> list:
        query = f"""SELECT category_one, category_two, category_three FROM categories_product WHERE CATEGORY_three = '{category}'"""
        category_all = await CategoriesProductDatabase.query_database(CategoriesProductDatabase(), query)
        return category_all[0]