import sys
import os
sys.path.append(os.getcwd())
from database.request_response_seller.request_response_seller import Request_response_seller_database as rss_db
import asyncio
from database.users import Users_database as DB_users
from database.location import Location_database as DB_location
from database.contacts import Contacts_database as DB_contacts
from database.prouct import Product_database as DB_products
from database.categories_product import Categories_product_database as DB_categories
from database.referral_program import Referral_database as DB_referral

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
asyncio.run(main())
