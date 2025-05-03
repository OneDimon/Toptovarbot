from aiogram.fsm.state import StatesGroup, State

class StateUser(StatesGroup):
    register_buyer_get_city = State()
    register_buyer_get_city_process = State()


class Location(StatesGroup):
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

class LocationLoader(StatesGroup):
    name = State()
    sector = State()
    building = State()
    floar = State()
    line = State()
    address = State()
    name = State()
    description = State()

class Contacts(StatesGroup):
    telegram = State()
    whatsapplink = State()
    adminvklink = State()
    add = State()
    edit = State()
    delete = State()
    edit_or_delete = State()


class Organization(StatesGroup):
    organization = State()

class PublicationProduct(StatesGroup):
    name = State()
    description = State()
    categories_inline = State()
    price = State()
    photo = State()

class CategoriesSearch(StatesGroup):
    category_one_level = State()
    category_two_level = State()
    category_three_level = State()
    confirm = State()
    inline = State()

class SellerSurvey(StatesGroup):
    categories_inline = State()
    confirm_category = State()
    photo = State()
    name_product = State()
    confirm = State()

class Balance(StatesGroup):
    menu = State()
    top_up = State()
    out = State()
    transaction_history = State()

class ConfirmLocationSeller(StatesGroup):
    photo = State()
    name_seller = State()
    text_address = State()
    comment = State()

class Admin(StatesGroup):
    rejection_comment = State()

class LocationConfirmation(StatesGroup):
    confirmation = State()
    comment = State()

class AddingAdminRights(StatesGroup):
    add = State()

