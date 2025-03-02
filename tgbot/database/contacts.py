from database import base


class ContactsDatabase(base.BaseDatabase):

    @staticmethod
    async def create_table_contacts()->None:
        """
        Создает таблицу для хранения данных контактов пользователей в базе данных.
        Эта функция не принимает параметры и ничего не возвращает.
        """
        query = """CREATE TABLE IF NOT EXISTS contacts
        (
            ID BIGSERIAL PRIMARY KEY NOT NULL,
            USER_ID BIGINT NOT NULL,
            CONTACTS VARCHAR(50),
            CONTACTS_TYPE VARCHAR(50),
            FOREIGN KEY (USER_ID) REFERENCES users (USER_ID)
            
        )"""

        await ContactsDatabase.query_database(ContactsDatabase(), query)


    @staticmethod
    async def get_all_contacts(user_id : int) -> list:
        query = f"""SELECT * FROM contacts WHERE USER_ID = {user_id}"""
        return await ContactsDatabase.query_database(ContactsDatabase(), query)
    

    @staticmethod
    async def get_type_contacts(user_id : int, contact_type : str) -> list:
        contact_type = contact_type.lower()
        query = f"""SELECT * FROM contacts WHERE USER_ID = {user_id} AND CONTACTS_TYPE = '{contact_type}'"""
        return await ContactsDatabase.query_database(ContactsDatabase(), query)
    

    @staticmethod
    async def get_contact(id : int) -> list:
        query = f"""SELECT * FROM contacts WHERE ID = {id}"""
        return await ContactsDatabase.query_database(ContactsDatabase(), query)
    

    @staticmethod
    async def edit_contact(id : int, contact : str) -> None:
        query = f"""UPDATE contacts SET CONTACTS = '{contact}' WHERE ID = {id}"""
        await ContactsDatabase.query_database(ContactsDatabase(), query)


    @staticmethod
    async def delete_contact(id : int) -> None:
        query = f"""DELETE FROM contacts WHERE ID = {id}"""
        await ContactsDatabase.query_database(ContactsDatabase(), query)


    @staticmethod   
    async def add_contact(user_id : int, contact : str, contact_type : str) -> None:
        query = f"""INSERT INTO contacts (USER_ID, CONTACTS, CONTACTS_TYPE) VALUES ({user_id}, '{contact}', '{contact_type}')"""
        await ContactsDatabase.query_database(ContactsDatabase(), query)

    