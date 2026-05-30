import sys
import os
sys.path.append(os.getcwd())
from database.request_response_seller.request_response_seller import RequestResponseSellerDatabase as rss_db
import asyncio
from database.general.users import UsersDatabase as DB_users
from database.seller.location_seller import LocationSellerDatabase as DB_location
from database.seller.contacts import ContactsDatabase as DB_contacts
from database.seller.product import ProductDatabase as DB_products
from database.system.categories_product import CategoriesProductDatabase as DB_categories
from database.general.referral_program import ReferralDatabase as DB_referral
from database.general.history_transaction import HistoryTransactionDatabase as DB_history
from database.system.system_info import SystemInfoDatabase as SystemInfoDatabase
from database.loader.location_loader import LocationLoaderDatabase as DB_location_loader
from database.loader.confirm_location_seller import ConfirmLocationSellerDatabase as DB_confirm_location_seller
from database.loader.delivery_order import DeliveryOrderDatabase as DB_delivery_order

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
    await DB_location_loader.create_table_location_loader()
    await DB_confirm_location_seller.create_table_confirm_location_seller()
    await DB_delivery_order.create_table()
    if not await SystemInfoDatabase.get_system_info('system_balance'):
        await SystemInfoDatabase.update_system_balance()

if __name__ == "__main__":
    asyncio.run(main())
