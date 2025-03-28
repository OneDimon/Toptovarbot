from database.system.system_info import SystemInfoDatabase
import asyncio

async def main():
    await SystemInfoDatabase.create_table()
    await SystemInfoDatabase.update_system_balance()
    print('System balance updated')

asyncio.run(main())