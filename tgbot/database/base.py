import sys
import os
sys.path.append(os.getcwd())
import psycopg2
from psycopg2 import Error
from config_data.config import *

class Base_database():
    async def query_database(self, query, my_error = False):
        result = False
        try:
            result = await self.__query_database(query)
        except (Exception, Error) as error:
            await self.__exeption_database(error)
        finally:
            await self.__finally_database(result)
            return result  

    async def __query_database(self, query):
        record = False
        connection = psycopg2.connect(user=USER,
                                      password=PASSWORD,
                                      host=HOST,
                                      port=PORT,
                                      database=DATABASE)
        cursor = connection.cursor()
        cursor.execute(query)
        connection.commit()
        if ("SELECT" in query):
            record = cursor.fetchall()
            if not record:
                record = []
        else:
            record = True
        cursor.close()
        connection.close()
        return record
    
    async def __exeption_database(self, error):
        print("Error while working with PostgreSQL", error)
    
    async def __finally_database(self, result):
        if result:
            print("Запрос выполнен")
        else:
            print("Запрос не выполнен или ответ пустой")
        

         