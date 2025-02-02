from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.categories_product import Categories_product_database as DB_categories_product
from handlers.base_handler_class import Steps_base
from config_data.config import *
from datetime import datetime
import hashlib

class Confirm (Steps_base):
    def __init__(self):
        name = 'confirm'
        module = 'categories_search'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Вы сделали свой выбор'
        data_state = await state.get_data()
        text += '\n' + data_state['categories_search_category_one_level'] + '\n' + data_state['categories_search_category_two_level'] + '\n' + data_state['categories_search_category_three_level']
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_categories_search"))
        builder.row(types.InlineKeyboardButton(text="Подтвердить", callback_data="confirm_categories_search"))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from handlers.user.user_class import User
        await User.buyer(call, state)

    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        await self.__set_result_search_in_database(call, state)
        await self.__response_finish(call, state)

    async def __set_result_search_in_database(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        ar_user_id_from_categories = await DB_categories_product.get_user_id_from_categories(data_state['categories_search_category_one_level'], 
                                                                                             data_state['categories_search_category_two_level'],
                                                                                             data_state['categories_search_category_three_level'])
        str_users_id = ','.join([str(x[0]) for x in ar_user_id_from_categories])
        date_str = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        hash = hashlib.md5((str(date_str) + str_users_id).encode('utf-8')).hexdigest()
        data_state['hash_categories_search'] = hash
        await state.update_data(data_state)
        await DB_categories_product.set_result_search(call.from_user.id, data_state['categories_search_category_three_level'], str_users_id, hash)

    async def __response_finish(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        link = 'http://tovartest.ru/contact/?link=' + data_state['hash_categories_search']
        await self.mssage_answer(call, 'Ваш поиск завершен, вы можете посмотреть результаты поиска \n' + link + '',)

