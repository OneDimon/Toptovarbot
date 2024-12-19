import sys
import os
sys.path.append(os.getcwd())
from database.request_response_seller.request_response_seller import Request_response_seller_database as rss_db
from handlers.request_response_seller.response_seller import Response_seller
from handlers.request_response_seller import managment_request_response
from handlers.request_response_seller.request_seller import Request_seller
from handlers.referral_program import referral_progrem_class
from handlers.referral_program import ref_tree
import asyncio
from aiogram import Bot, Dispatcher, types
from aiogram.filters import Command
from datetime import datetime, timedelta
from database.users import Users_database as DB_users
from database.location import Location_database as DB_location
from database.contacts import Contacts_database as DB_contacts
from database.prouct import Product_database as DB_products
from database.categories_product import Categories_product_database as DB_categories
from database.referral_program import Referral_database as DB_referral

from states import states
import random




import requests
import json
async def main():

# Set API endpoint and credentials
    api_endpoint = "https://api-seller.ozon.ru/v1/description-category/tree"
    api_key = "5f042015-e73c-42ac-910c-1e33c24b883e"
    client_id = "2340186"

    # Set headers with API credentials
    headers = {
        "Api-Key": api_key,
        "Client-Id": client_id
    }
    # Send POST request
    response = requests.post(api_endpoint, headers=headers)
    data = json.loads(response.content)
    for category_1 in data['result']:
        for category_2 in category_1['children']:
            for category_3 in category_2['children']:
                await DB_categories.create_category_product(category_1['category_name'], category_2['category_name'], category_3['type_name'])
    a =1


asyncio.run(main())
