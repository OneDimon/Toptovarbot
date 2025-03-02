import sys
import os
sys.path.append(os.getcwd())
from database.request_response_seller.request_response_seller import RequestResponseSellerDatabase as rss_db
import asyncio
from database.users import UsersDatabase as DB_users
from database.location import LocationDatabase as DB_location
from database.contacts import ContactsDatabase as DB_contacts
from database.prouct import ProductDatabase as DB_products
from database.categories_product import CategoriesProductDatabase as DB_categories
from database.referral_program import ReferralDatabase as DB_referral
from database.history_transaction import HistoryTransactionDatabase as DB_history
from database.system_info import SystemInfoDatabase as SystemInfoDatabase
async def main():
    await DB_users.create_table_user()
    await DB_users.add_user(1, 'root')
    rss_db_obj = rss_db()
    await rss_db_obj.create_table_request_response_seller()
    await rss_db_obj.create_table_response_seller()
    await DB_location.create_table_location()
    await DB_contacts.create_table_contacts()
    await DB_products.create_table()
    await DB_categories.create_table_categories_product()
    await DB_categories.create_table_categories_search()
    await DB_referral.create_table()
    await DB_history.create_table()
    await SystemInfoDatabase.create_table()
    if not await SystemInfoDatabase.get_system_info('system_balance'):
        await SystemInfoDatabase.update_system_balance()
asyncio.run(main())
