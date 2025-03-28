from database import base


class LocationLoaderDatabase(base.BaseDatabase):

    @staticmethod
    async def create_table_location_loader() -> None:
        """
        Создает таблицу для хранения данных о местоположениях загрузчиков в базе данных.
        Таблица определена в миграции update_system/migrations/14032025_create_location_loader.sql
        Эта функция не принимает параметры и ничего не возвращает.
        """
        # Создаем основную таблицу location_loader
        query_main = """CREATE TABLE IF NOT EXISTS location_loader
                      (ID BIGSERIAL PRIMARY KEY NOT NULL,
                       USER_ID BIGINT NOT NULL,
                       NAME_OF_PLACE VARCHAR(50),
                       SECTOR VARCHAR(50),
                       BUILDING VARCHAR(50),
                       FLOAR VARCHAR(50),
                       ADDRESS VARCHAR(50),
                       FOREIGN KEY (USER_ID) REFERENCES users (USER_ID));"""
        
        await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), query_main)
        
        # Создаем таблицу для строк (линий) местоположений
        query_lines = """CREATE TABLE IF NOT EXISTS location_loader_lines
                       (ID BIGSERIAL PRIMARY KEY NOT NULL,
                        LOCATION_LOADER_ID BIGINT NOT NULL,
                        LINE VARCHAR(50),
                        FOREIGN KEY (LOCATION_LOADER_ID) REFERENCES location_loader (ID));"""
        
        await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), query_lines)

    @staticmethod
    async def get_location(user_id : int) -> list:
        query = """SELECT 
                    ll.ID as location_id,
                    ll.USER_ID,
                    ll.NAME_OF_PLACE,
                    ll.SECTOR,
                    ll.BUILDING,
                    ll.FLOAR,
                    ll.ADDRESS,
                    ARRAY_AGG(lll.LINE) as lines
                FROM location_loader ll
                LEFT JOIN location_loader_lines lll ON lll.LOCATION_LOADER_ID = ll.ID
                WHERE ll.USER_ID = %s
                GROUP BY ll.ID;
                """
        return await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), query, user_id)
    
    @staticmethod
    async def add_or_update_location(user_id : int, name_of_place : str, sector : str, building : str, floar : int, lines : list, address : str):
        # Получаем ID существующей записи (если есть)
        check_query = "SELECT ID FROM location_loader WHERE USER_ID = %s"
        result = await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), check_query, user_id)
        
        if result:
            # Если запись существует, обновляем
            location_id = result[0]['id']
            update_query = """UPDATE location_loader 
                          SET NAME_OF_PLACE = %s,
                              SECTOR = %s,
                              BUILDING = %s,
                              FLOAR = %s,
                              ADDRESS = %s
                          WHERE USER_ID = %s"""
            await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), update_query, 
                                                      name_of_place, sector, building, floar, address, user_id)
            
            # Удаляем старые строки
            delete_query = "DELETE FROM location_loader_lines WHERE LOCATION_LOADER_ID = %s"
            await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), delete_query, location_id)
            
            # Добавляем новые строки
            for line in lines:
                insert_line_query = "INSERT INTO location_loader_lines (LOCATION_LOADER_ID, LINE) VALUES (%s, %s)"
                await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), insert_line_query, location_id, line)
        else:
            # Если записи нет, создаем новую
            insert_query = """INSERT INTO location_loader (USER_ID, NAME_OF_PLACE, SECTOR, BUILDING, FLOAR, ADDRESS)
                           VALUES (%s, %s, %s, %s, %s, %s) RETURNING ID"""
            result = await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), insert_query, 
                                                               user_id, name_of_place, sector, building, floar, address)
            
            location_id = result[0]['id']
            
            # Добавляем строки
            for line in lines:
                insert_line_query = "INSERT INTO location_loader_lines (LOCATION_LOADER_ID, LINE) VALUES (%s, %s)"
                await LocationLoaderDatabase.query_database(LocationLoaderDatabase(), insert_line_query, location_id, line)
    
