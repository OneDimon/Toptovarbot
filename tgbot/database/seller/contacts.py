from database import base


class ContactsDatabase(base.BaseDatabase):

    @staticmethod
    async def create_table_contacts()->None:
        """
        Создает таблицу для хранения данных контактов пользователей в базе данных.
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
        query = """SELECT * FROM contacts WHERE USER_ID = %s"""
        return await ContactsDatabase.query_database(ContactsDatabase(), query, user_id)
    

    @staticmethod
    async def get_type_contacts(user_id : int, contact_type : str) -> list:
        contact_type = contact_type.lower()
        query = """SELECT * FROM contacts WHERE USER_ID = %s AND CONTACTS_TYPE = %s"""
        return await ContactsDatabase.query_database(ContactsDatabase(), query, user_id, contact_type)
    

    @staticmethod
    async def get_contact(id : int) -> list:
        query = """SELECT * FROM contacts WHERE ID = %s"""
        all_data = await ContactsDatabase.query_database(ContactsDatabase(), query, id)
        if (not all_data):
            return None
        return all_data[0]
    

    @staticmethod
    async def edit_contact(id : int, contact : str) -> None:
        query = """UPDATE contacts SET CONTACTS = %s WHERE ID = %s"""
        await ContactsDatabase.query_database(ContactsDatabase(), query, contact, id)


    @staticmethod
    async def delete_contact(id : int) -> None:
        query = """DELETE FROM contacts WHERE ID = %s"""
        await ContactsDatabase.query_database(ContactsDatabase(), query,id)


    @staticmethod   
    async def add_contact(user_id : int, contact : str, contact_type : str) -> None:
        query = """INSERT INTO contacts (USER_ID, CONTACTS, CONTACTS_TYPE) VALUES (%s, %s, %s)"""
        await ContactsDatabase.query_database(ContactsDatabase(), query, user_id, contact, contact_type)

    