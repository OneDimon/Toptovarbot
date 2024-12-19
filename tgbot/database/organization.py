from database import base


class Organization_database(base.Base_database):
    
    @staticmethod
    async def add_organization(user_id: int, organization: str):
        query = f"""UPDATE users SET ORGANIZATION = '{organization}' WHERE USER_ID = {user_id}"""
        await Organization_database.query_database(Organization_database(), query)

    @staticmethod
    async def get_organization(user_id: int) -> list:
        query = f"""SELECT ORGANIZATION FROM users WHERE USER_ID = {user_id}"""
        return await Organization_database.query_database(Organization_database(), query)