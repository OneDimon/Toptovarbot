from database import base
from datetime import datetime

class Categories_product_database(base.Base_database):

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
            CATEGORY_three VARCHAR(50) UNIQUE
        )"""

        await Categories_product_database.query_database(Categories_product_database(), query)

    @staticmethod
    async def set_category_from_ozon()->None:
        ozon_categories = [
            ["Электроника", "Мобильные телефоны", "Смартфоны"],
            ["Электроника", "Мобильные телефоны", "Кнопочные телефоны"],
            ["Электроника", "Ноутбуки", "Игровые ноутбуки"],
            ["Электроника", "Ноутбуки", "Бизнес-ноутбуки"],
            ["Электроника", "Телевизоры", "Смарт-телевизоры"],
            ["Электроника", "Телевизоры", "LED-телевизоры"],
            ["Электроника", "Аудиотехника", "Наушники"],
            ["Электроника", "Аудиотехника", "Колонки"],
            ["Электроника", "Фототехника", "Цифровые фотоаппараты"],
            ["Электроника", "Фототехника", "Зеркальные фотоаппараты"],
            ["Бытовая техника", "Крупная бытовая техника", "Холодильники"],
            ["Бытовая техника", "Крупная бытовая техника", "Стиральные машины"],
            ["Бытовая техника", "Мелкая бытовая техника", "Пылесосы"],
            ["Бытовая техника", "Мелкая бытовая техника", "Мультиварки"],
            ["Дом и сад", "Мебель", "Диваны"],
            ["Дом и сад", "Мебель", "Кровати"],
            ["Дом и сад", "Мебель", "Шкафы"],
            ["Дом и сад", "Кухня", "Кухонная утварь"],
            ["Дом и сад", "Кухня", "Столовые приборы"],
            ["Дом и сад", "Инструменты", "Электроинструменты"],
            ["Дом и сад", "Инструменты", "Ручные инструменты"],
            ["Мода", "Мужская одежда", "Рубашки"],
            ["Мода", "Мужская одежда", "Брюки"],
            ["Мода", "Мужская одежда", "Куртки"],
            ["Мода", "Женская одежда", "Платья"],
            ["Мода", "Женская одежда", "Юбки"],
            ["Мода", "Женская одежда", "Блузки"],
            ["Мода", "Детская одежда", "Футболки"],
            ["Мода", "Детская одежда", "Брюки"],
            ["Красота и здоровье", "Уход за кожей", "Увлажнители"],
            ["Красота и здоровье", "Уход за кожей", "Очищающие средства"],
            ["Красота и здоровье", "Уход за волосами", "Шампуни"],
            ["Красота и здоровье", "Уход за волосами", "Кондиционеры"],
            ["Красота и здоровье", "Парфюмерия", "Женские духи"],
            ["Красота и здоровье", "Парфюмерия", "Мужские духи"],
            ["Красота и здоровье", "Макияж", "Тональные средства"],
            ["Красота и здоровье", "Макияж", "Тушь для ресниц"],
            ["Спорт и отдых", "Фитнес-оборудование", "Беговые дорожки"],
            ["Спорт и отдых", "Фитнес-оборудование", "Гантели"],
            ["Спорт и отдых", "Кемпинг и походы", "Палатки"],
            ["Спорт и отдых", "Кемпинг и походы", "Спальные мешки"],
            ["Спорт и отдых", "Велоспорт", "Горные велосипеды"],
            ["Спорт и отдых", "Велоспорт", "Дорожные велосипеды"],
            ["Детские товары", "Игрушки", "Конструкторы"],
            ["Детские товары", "Игрушки", "Куклы"],
            ["Детские товары", "Детское питание", "Смеси"],
            ["Детские товары", "Детское питание", "Пюре"],
            ["Книги и канцелярия", "Книги", "Художественная литература"],
            ["Книги и канцелярия", "Книги", "Научная литература"],
            ["Книги и канцелярия", "Канцелярия", "Бумага"],
            ["Книги и канцелярия", "Канцелярия", "Ручки"],
            ["Автотовары", "Автоаксессуары", "Чехлы"],
            ["Автотовары", "Автоаксессуары", "Навигаторы"],
            ["Автотовары", "Автозапчасти", "Моторные масла"],
            ["Автотовары", "Автозапчасти", "Фильтры"]
        ]
        for category in ozon_categories:
            await Categories_product_database.create_category_product(category[0], category[1], category[2])

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
        await Categories_product_database.query_database(Categories_product_database(), query)

    @staticmethod
    async def get_search_history_user(user_id: int, date: str) -> list:
        query = f"""SELECT * FROM categories_search WHERE USER_ID = {user_id} AND DATETIME = '{date}'"""
        return await Categories_product_database.query_database(Categories_product_database(), query)

    @staticmethod
    async def create_category_product(category_one: str, category_two: str, category_three: str) -> None:
        query = f"""INSERT INTO categories_product (CATEGORY_one, CATEGORY_two, CATEGORY_three) VALUES ('{category_one}', '{category_two}', '{category_three}')"""
        await Categories_product_database.query_database(Categories_product_database(), query)
    @staticmethod
    async def get_all_categories() -> list:
        query = """SELECT * FROM categories_product"""
        return await Categories_product_database.query_database(Categories_product_database(), query)
    
    @staticmethod
    async def get_user_id_from_categories(category_one: str, category_two: str, category_three: str) -> list:
        query = f"""SELECT DISTINCT user_id FROM product WHERE category_three = '{category_three}'"""
        sellers_id = await Categories_product_database.query_database(Categories_product_database(), query)
        if sellers_id:
            return sellers_id
        query = f"""SELECT DISTINCT user_id FROM product WHERE category = '{category_two}'"""
        sellers_id = await Categories_product_database.query_database(Categories_product_database(), query)
        if sellers_id:
            return sellers_id
        query = f"""SELECT DISTINCT user_id FROM product WHERE category = '{category_one}'"""
        sellers_id = await Categories_product_database.query_database(Categories_product_database(), query)
        return sellers_id

    @staticmethod
    async def set_result_search(user_id: int, category_three: str, result: str, hash: str) -> None:
        query = f"""INSERT INTO categories_search (CATEGORY, DATETIME, USER_ID, RESULT, LINK) VALUES ('{category_three}', '{datetime.now()}', {user_id}, '{result}', '{hash}')"""
        await Categories_product_database.query_database(Categories_product_database(), query)

    @staticmethod
    async def get_three_categories(category: str) -> list:
        query = f"""SELECT category_one, category_two, category_three FROM categories_product WHERE CATEGORY_three = '{category}'"""
        category_all = await Categories_product_database.query_database(Categories_product_database(), query)
        return category_all[0]