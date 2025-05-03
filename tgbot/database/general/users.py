from database import base
import datetime


class UsersDatabase(base.BaseDatabase):
    """
    Класс для работы с базой данных регистрации. 
    """
    @staticmethod
    async def create_table_user()->None:
        """
        Создает таблицу для хранения данных регистрации пользователей в базе данных.
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
        await UsersDatabase.query_database(UsersDatabase(), query)




    @staticmethod
    async def get_user_from_user_id(user_id : int) -> list:
        """
        Возвращает данные пользователя из базы данных по его ID.
        :param user_id: ID пользователя
        :type user_id: int
        :return: данные пользователя
        """
        query = """SELECT * FROM users WHERE USER_ID = %s"""
        all_result = await UsersDatabase.query_database(UsersDatabase(), query, user_id)
        if all_result == []:
            return None
        return all_result[0]
    

    @staticmethod
    async def add_user(user_id : int, name : str):
        await UsersDatabase.__add_users(user_id, name)

    @staticmethod
    async def set_user_city(user_id : int, city : str):
        query = """UPDATE users SET CITY = %s WHERE USER_ID = %s"""
        await UsersDatabase.query_database(UsersDatabase(), query, city, user_id)
    

    @staticmethod
    async def __add_users(user_id : int, name : str):
        query = """INSERT INTO users
                 (USER_ID, NAME, DATE_OF_REGISTRATION) 
                 VALUES
                   (%s, %s, %s)"""
        await UsersDatabase.query_database(UsersDatabase(), query, 
                                         user_id, name, datetime.date.today().strftime('%Y-%m-%d'))
    
    @staticmethod
    async def add_subscription(user_id : int, date_of_end : datetime):
        query = """UPDATE users SET SUBSCRIPTION = true, DATE_END_SUBSCRIPTION = %s WHERE USER_ID = %s"""
        await UsersDatabase.query_database(UsersDatabase(), query, 
                                         date_of_end.strftime('%Y-%m-%d %H:%M:%S'), user_id)


    @staticmethod
    async def set_user_offerta(user_id : int, offerta : bool):
        query = """UPDATE users SET OFFERTA = %s WHERE USER_ID = %s"""
        await UsersDatabase.query_database(UsersDatabase(), query, offerta, user_id)

    @staticmethod
    async def set_t_phone(user_id : int, tfone : str):
        query = """UPDATE users SET TFONE = %s WHERE USER_ID = %s"""
        await UsersDatabase.query_database(UsersDatabase(), query, tfone, user_id)

    @staticmethod 
    async def set_property(user_id : int, property : str, value : str):
        query = f"""UPDATE users SET {property} = %s WHERE USER_ID = %s"""
        await UsersDatabase.query_database(UsersDatabase(), query, value, user_id)