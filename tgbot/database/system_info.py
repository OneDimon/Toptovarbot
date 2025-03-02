from database import base

class SystemInfoDatabase(base.BaseDatabase):

    @staticmethod
    async def create_table() -> None:
        query = """CREATE TABLE IF NOT EXISTS system_info
        (
            ID BIGSERIAL PRIMARY KEY NOT NULL,
            NAME VARCHAR(100) NOT NULL UNIQUE,
            VALUE VARCHAR(1000) NOT NULL
        )"""
        await SystemInfoDatabase.query_database(SystemInfoDatabase(), query)

    @staticmethod
    async def get_system_info(name: str) -> str:
        query = f"SELECT VALUE FROM system_info WHERE NAME = '{name}'"
        result = await SystemInfoDatabase.query_database(SystemInfoDatabase(), query)
        if (not result):
            return None
        return result
    
    @staticmethod
    async def set_system_info(name: str, value: str) -> None:
        query = f"INSERT INTO system_info (NAME, VALUE) VALUES ('{name}', '{value}') ON CONFLICT (NAME) DO UPDATE SET VALUE = '{value}'"
        await SystemInfoDatabase.query_database(SystemInfoDatabase(), query)

    @staticmethod
    async def update_system_balance()->None:
        query = """SELECT balance, points FROM referral"""
        result = await SystemInfoDatabase.query_database(SystemInfoDatabase(), query)
        system_balance = 0
        for i in result:
            balance = i[0] if i[0] != None else 0
            points = i[1] if i[1] != None else 0
            system_balance += balance + points
        await SystemInfoDatabase.set_system_info('system_balance', str(system_balance))
            