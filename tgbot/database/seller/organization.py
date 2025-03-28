from database import base


class OrganizationDatabase(base.BaseDatabase):
    
    @staticmethod
    async def add_organization(user_id: int, organization: str):
        query = """UPDATE users SET ORGANIZATION = %s WHERE USER_ID = %s"""
        await OrganizationDatabase.query_database(OrganizationDatabase(), query, (organization, user_id))

    @staticmethod
    async def get_organization(user_id: int) -> list:
        query = """SELECT ORGANIZATION FROM users WHERE USER_ID = %s"""
        return await OrganizationDatabase.query_database(OrganizationDatabase(), query, (user_id,))