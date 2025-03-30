from database import base


class LocationSellerDatabase(base.BaseDatabase):

    @staticmethod
    async def create_table_location()->None:
        """
        Создает таблицу для хранения данных местоположения пользователей в базе данных.
        Эта функция не принимает параметры и ничего не возвращает.
        """
        query = """CREATE TABLE IF NOT EXISTS location
                    (ID BIGSERIAL PRIMARY KEY NOT NULL,
                    USER_ID BIGINT NOT NULL,
                    NAME_OF_PLACE VARCHAR(50),
                    SECTOR VARCHAR(50),
                    BUILDING VARCHAR(50),
                    FLOAR VARCHAR(50),
                    LINE VARCHAR(50),
                    PLACE VARCHAR(50),
                    ADDRESS VARCHAR(50),
                    PHOTO VARCHAR(100),
                    FOREIGN KEY (USER_ID) REFERENCES users (USER_ID)); """
        
        await LocationSellerDatabase.query_database(LocationSellerDatabase(), query)

    @staticmethod
    async def get_location(user_id : int) -> list:
        query = """SELECT * FROM location WHERE USER_ID = %s"""
        all_data = await LocationSellerDatabase.query_database(LocationSellerDatabase(), query, user_id)
        if all_data == []:
            return None
        return all_data[0]
    
    @staticmethod
    async def add_location(user_id : int, name_of_place : str, sector : str, building : str, floar : int, line : str, place : str, address : str, photo : str) -> None:
        query = """INSERT INTO location (USER_ID, 
                                            NAME_OF_PLACE,
                                            SECTOR, 
                                            BUILDING, 
                                            FLOAR,
                                            LINE, 
                                            PLACE, 
                                            ADDRESS, 
                                            PHOTO) 
                                VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)"""
        await LocationSellerDatabase.query_database(LocationSellerDatabase(), query, 
                                                   user_id, name_of_place, sector, building, floar, line, place, address, photo)

    @staticmethod
    async def update_location(id : int, name_of_place : str, sector : str, building : str, floar : int, line : str, place : str, address : str, photo : str) -> None:
        query = """UPDATE location SET NAME_OF_PLACE = %s,
                                            SECTOR = %s,
                                            BUILDING = %s,
                                            FLOAR = %s,
                                            LINE = %s,
                                            PLACE = %s,
                                            ADDRESS = %s,
                                            PHOTO = %s
                                            WHERE ID = %s"""
        await LocationSellerDatabase.query_database(LocationSellerDatabase(), query, 
                                                   name_of_place, sector, building, floar, line, place, address, photo, id)