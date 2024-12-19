from aiogram import F
from loader import dp
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from database.categories_seller import *


CHOICE = None
CAT_A = None
CAT_B = None
CATEGORIES_A = []
CATEGORIES_B = []
CATEGORIES_C = []


@dp.message(F.text.lower() == "аккаунт 1327721984")
async def confirm_payment_seller(message: types.Message):
    builder = InlineKeyboardBuilder()
    builder.row(types.InlineKeyboardButton(
        text="Реферальная программа", callback_data="ref_program_1327721984")
    )
    builder.row(types.InlineKeyboardButton(
        text="Категории товаров", callback_data="product_categories_1327721984")
    )
    builder.row(types.InlineKeyboardButton(
        text="Назад", callback_data="/start")
    )
    await message.answer("Вы вошли в панель администратора. Выберите нужный пункт:",
                         reply_markup=builder.as_markup())


@dp.callback_query(F.data == "ref_program_1327721984")
async def account_seller(callback: types.CallbackQuery):
    builder = InlineKeyboardBuilder()
    builder.row(types.InlineKeyboardButton(
        text="Реферреры по возрастанию", callback_data="referrer_1327721984")
    )
    builder.row(types.InlineKeyboardButton(
        text="Инфо по Вашей ссылке", callback_data="first_referrer_1327721984")
    )
    builder.row(types.InlineKeyboardButton(
        text="Назад", callback_data="аккаунт 1327721984")  # решить вопрос с переходом!!!
    )
    await callback.message.answer("Выберите что хотите узнать!",
                                  reply_markup=builder.as_markup())


@dp.callback_query(F.data == "product_categories_1327721984")
async def account_seller(callback: types.CallbackQuery):
    builder = InlineKeyboardBuilder()
    builder.row(types.InlineKeyboardButton(
        text="Категории в БД", callback_data="cat_in_database_1327721984")
    )
    builder.row(types.InlineKeyboardButton(
        text="Добавить категории", callback_data="add_cat_1327721984")
    )
    builder.row(types.InlineKeyboardButton(
        text="Назад", callback_data="аккаунт 1327721984")  # решить вопрос с переходом!!!
    )
    await callback.message.answer("Выберите что хотите узнать!",
                                  reply_markup=builder.as_markup())


@dp.callback_query(F.data == "cat_in_database_1327721984")
async def choice_category_a(callback: types.CallbackQuery):
    categories_a = getting_categoryes_a()
    global CATEGORIES_A
    builder = InlineKeyboardBuilder()
    for category in categories_a:
        CATEGORIES_A.append(category[0])
        builder.row(types.InlineKeyboardButton(
            text=category[0], callback_data=category[0])
        )
    builder.row(types.InlineKeyboardButton(
        text="Назад", callback_data="product_categories_1327721984")
    )
    await callback.message.answer("Категории товаров в базе данных:",
                                  reply_markup=builder.as_markup())


@dp.callback_query(F.data.in_(CATEGORIES_A))
async def choice_category_b(callback: types.CallbackQuery):
    global CATEGORIES_A
    global CATEGORIES_B
    CATEGORIES_A = []
    global CAT_A
    CAT_A = callback.data
    categories_b = getting_categoryes_b(CAT_A)
    builder = InlineKeyboardBuilder()
    for category in categories_b:
        CATEGORIES_B.append(category[0])
        builder.row(types.InlineKeyboardButton(
            text=category[0], callback_data=category[0])
        )
    builder.row(types.InlineKeyboardButton(
        text="Назад", callback_data="cat_in_database_1327721984")
    )
    await callback.message.answer(f"{CAT_A}:", reply_markup=builder.as_markup())


@dp.callback_query(F.data.in_(CATEGORIES_B))
async def choice_category_c(callback: types.CallbackQuery):
    global CATEGORIES_B
    global CATEGORIES_C
    CATEGORIES_B = []
    global CAT_B
    CAT_B = callback.data
    categories_c = getting_categoryes_c(CAT_B)
    builder = InlineKeyboardBuilder()
    for category in categories_c:
        CATEGORIES_C.append(category[0])
        print(category[0])
        builder.row(types.InlineKeyboardButton(
            text=category[0], callback_data=category[0])
        )
    builder.row(types.InlineKeyboardButton(
        text="Назад", callback_data=CAT_A)
    )
    print(CATEGORIES_C)
    await callback.message.answer(f"{CAT_A}=>{CAT_B}:", reply_markup=builder.as_markup())


@dp.callback_query(F.data.in_(CATEGORIES_C))
async def category_end(callback: types.CallbackQuery):
    global CATEGORIES_C
    CATEGORIES_C = []
    builder = InlineKeyboardBuilder()
    builder.row(types.InlineKeyboardButton(
        text="Назад", callback_data=CAT_B)
    )
    builder.row(types.InlineKeyboardButton(
        text="Категории товаров", callback_data="product_categories_1327721984")
    )
    await callback.message.answer("Это вся глубина товаров!",
                                  reply_markup=builder.as_markup())


@dp.callback_query(F.data == "add_cat_1327721984")
async def account_seller(callback: types.CallbackQuery):
    builder = InlineKeyboardBuilder()
    builder.row(types.InlineKeyboardButton(
        text="Назад", callback_data="product_categories_1327721984")
    )
    await callback.message.answer("Выберите что хотите узнать!",
                                  reply_markup=builder.as_markup())
