import os
from dotenv import load_dotenv, find_dotenv


if not find_dotenv():
    exit('Переменные окружения не загружены т.к отсутствует файл .env')
else:
    load_dotenv()

BOT_TOKEN = os.getenv('BOT_TOKEN')
USER = os.getenv('USER_NAME')
PASSWORD = os.getenv('PASSWORD')
CHANNEL = os.getenv('CHANNEL')
HOST = os.getenv('HOST')
PORT = os.getenv('PORT')
DATABASE = os.getenv('DATABASE')
LINK_BOT = os.getenv('LINK_BOT')

