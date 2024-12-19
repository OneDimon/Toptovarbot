from database import base
import datetime


class Users_database(base.Base_database):
    """
    Класс для работы с базой данных регистрации. 
    """
    @staticmethod
    async def create_table_user()->None:
        """
        Создает таблицу для хранения данных регистрации пользователей в базе данных.
        Эта функция не принимает параметры и ничего не возвращает.
        """
        query = """CREATE TABLE IF NOT EXISTS users
            (
                ID BIGSERIAL PRIMARY KEY NOT NULL,
                USER_ID BIGINT UNIQUE NOT NULL,
                CITY VARCHAR(100),
                SUBSCRIPTION BOOLEAN, 
                DATE_OF_REGISTRATION DATE,
                DATE_END_SUBSCRIPTION TIMESTAMP,
                ORGANIZATION VARCHAR(100),
                NAME VARCHAR(100),
                OFFERTA BOOLEAN DEFAULT FALSE,
                TFONE VARCHAR(100)            
            )"""
        await Users_database.query_database(Users_database(), query)




    @staticmethod
    async def get_user_from_user_id(user_id : int) -> list:
        """
        Возвращает данные пользователя из базы данных по его ID.
        :param user_id: ID пользователя
        :type user_id: int
        :return: данные пользователя
        """
        query = f"""SELECT * FROM users WHERE USER_ID = {user_id}"""
        return await Users_database.query_database(Users_database() ,query)

    @staticmethod
    async def add_user(user_id : int, name : str):
        await Users_database.__add_users(user_id, name)

    @staticmethod
    async def set_user_city(user_id : int, city : str):
        query = f"""UPDATE users SET CITY = '{city}' WHERE USER_ID = {user_id}"""
        await Users_database.query_database(Users_database(), query)
    

    @staticmethod
    async def __add_users(user_id : int, name : str):
        query = f"""INSERT INTO users
                 (USER_ID, NAME, DATE_OF_REGISTRATION) 
                 VALUES
                   ({user_id}, '{name}', '{datetime.date.today().strftime('%Y-%m-%d')}')"""
        await Users_database.query_database(Users_database(), query)
    
    @staticmethod
    async def add_subscription(user_id : int, date_of_end : datetime):
        query = f"""UPDATE users SET SUBSCRIPTION = true, DATE_END_SUBSCRIPTION = '{date_of_end.strftime('%Y-%m-%d %H:%M:%S')}' WHERE USER_ID = {user_id}"""
        await Users_database.query_database(Users_database(), query)


    @staticmethod
    async def set_user_offerta(user_id : int, offerta : bool):
        query = f"""UPDATE users SET OFFERTA = {offerta} WHERE USER_ID = {user_id}"""
        await Users_database.query_database(Users_database(), query)

    @staticmethod
    async def set_t_phone(user_id : int, tfone : str):
        query = f"""UPDATE users SET TFONE = '{tfone}' WHERE USER_ID = {user_id}"""
        await Users_database.query_database(Users_database(), query)