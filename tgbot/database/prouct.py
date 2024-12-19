from database import base

class Product_database (base.Base_database):

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
        await Product_database.query_database(Product_database(), query)

    @staticmethod
    async def get_product_by_user(id_user):
        query = f"""SELECT * FROM product WHERE USER_ID = {id_user}"""
        return await Product_database.query_database(Product_database(), query)
    
    @staticmethod
    async def get_product_by_user_and_date(id_user, date):
        query = f"""SELECT * FROM product WHERE USER_ID = {id_user} AND DATE_PUBLICATION = '{date}'"""
        return await Product_database.query_database(Product_database(), query)
    
    @staticmethod
    async def publication_product(id_user, name, description, price, category, category_two, category_three, photo):
        query = f"""INSERT INTO product (USER_ID, NAME, DESCRIPTION, CATEGORY, CATEGORY_TWO, CATEGORY_THREE, PRICE, PHOTO, DATE_PUBLICATION)
                 VALUES ({id_user}, '{name}', '{description}', '{category}', '{category_two}', '{category_three}', {price}, '{photo}', NOW())"""
        await Product_database.query_database(Product_database(), query)