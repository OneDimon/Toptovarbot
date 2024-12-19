from aiogram.fsm.state import StatesGroup, State

class ResponseSeller(StatesGroup):
    prestate = State()
    start = State()
    wait_poduct = State()
    no_product = State()
    there_is_similar_product = State()
    there_is_a_product = State()
    there_is_a_product_photo_uploaded = State()
    there_is_a_product_name_uploaded = State()
    there_is_a_product_price_uploaded = State()
    there_is_a_product_quantity_uploaded = State()
    finish = State()        