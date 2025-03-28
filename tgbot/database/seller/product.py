from database import base

class ProductDatabase (base.BaseDatabase):

    @staticmethod
    async def create_table():
        query = """CREATE TABLE IF NOT EXISTS product
            (
                ID BIGSERIAL PRIMARY KEY NOT NULL,
                USER_ID BIGINT NOT NULL,
                NAME VARCHAR(100) NOT NULL,
                DESCRIPTION VARCHAR(1000) NOT NULL,
                CATEGORY VARCHAR(100) NOT NULL,
                CATEGORY_TWO VARCHAR(100) NOT NULL,
                CATEGORY_THREE VARCHAR(100) NOT NULL,
                PRICE INT NOT NULL, 
                PHOTO VARCHAR(1000) NOT NULL,
                DATE_PUBLICATION DATE NOT NULL,
                AVAILABLE BOOLEAN DEFAULT TRUE,
                FOREIGN KEY(USER_ID) REFERENCES users(USER_ID)
            )"""
        await ProductDatabase.query_database(ProductDatabase(), query)

    @staticmethod
    async def get_product_by_user(id_user):
        query = """SELECT * FROM product WHERE USER_ID = %s"""
        return await ProductDatabase.query_database(ProductDatabase(), query, (id_user,))
    
    @staticmethod
    async def get_product_by_user_and_date(id_user, date):
        query = """SELECT * FROM product WHERE USER_ID = %s AND DATE_PUBLICATION = %s"""
        return await ProductDatabase.query_database(ProductDatabase(), query, (id_user, date))
    
    @staticmethod
    async def publication_product(id_user, name, description, price, category, category_two, category_three, photo):
        query = """INSERT INTO product (USER_ID, NAME, DESCRIPTION, CATEGORY, CATEGORY_TWO, CATEGORY_THREE, PRICE, PHOTO, DATE_PUBLICATION)
                 VALUES (%s, %s, %s, %s, %s, %s, %s, %s, NOW())"""
        await ProductDatabase.query_database(ProductDatabase(), query, (id_user, name, description, category, category_two, category_three, price, photo))