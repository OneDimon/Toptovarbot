from aiogram.fsm.state import StatesGroup, State

class StateUser(StatesGroup):
    register_buyer_get_city = State()
    register_buyer_get_city_process = State()


class location(StatesGroup):
    name = State()
    sector = State()
    building = State()
    floar = State()
    line = State()
    place = State()
    address = State()
    name = State()
    photo = State()
    description = State()

class contacts(StatesGroup):
    telegram = State()
    whatsapplink = State()
    admin_vk_link = State()
    add = State()
    edit = State()
    delete = State()
    edit_or_delete = State()


class organization(StatesGroup):
    organization = State()

class publication_product(StatesGroup):
    name = State()
    description = State()
    categories_inline = State()
    price = State()
    photo = State()

class categories_search(StatesGroup):
    category_one_level = State()
    category_two_level = State()
    category_three_level = State()
    confirm = State()
    inline = State()

class seller_survey(StatesGroup):
    categories_inline = State()
    confirm_category = State()
    photo = State()
    name_product = State()
    confirm = State()

class balance(StatesGroup):
    menu = State()
    top_up = State()