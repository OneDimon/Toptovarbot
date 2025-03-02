from database import base


class OrganizationDatabase(base.BaseDatabase):
    
    @staticmethod
    async def add_organization(user_id: int, organization: str):
        query = f"""UPDATE users SET ORGANIZATION = '{organization}' WHERE USER_ID = {user_id}"""
        await OrganizationDatabase.query_database(OrganizationDatabase(), query)

    @staticmethod
    async def get_organization(user_id: int) -> list:
        query = f"""SELECT ORGANIZATION FROM users WHERE USER_ID = {user_id}"""
        return await OrganizationDatabase.query_database(OrganizationDatabase(), query)