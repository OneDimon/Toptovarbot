from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from states.states import categories_search as State_categories_search
from database.categories_product import Categories_product_database as DB_categories_product
from handlers.base_handler_class import Base_hanler, Steps_base
from modules.photo_verification_modules import Photo_verification_modules
from aiogram.types import FSInputFile
from config_data.config import *
import numpy as np
from datetime import datetime
import hashlib


class Categories_search (Base_hanler):
    @staticmethod
    async def back_categories_search(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_categories_search'].pop()
        func = data_state['ar_func_categories_search'][-1]
        await func(call, state)

class categories_search_category_one_level (Steps_base):
    def __init__(self):
        name = 'category_one_level'
        module = 'categories_search'
        super().__init__(name, module)

    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        if not await self._if_option_search(call, state):
            return True
        await self._initialize_categories_search_data_state(call, state)

            
    async def _if_option_search(self, call: types.CallbackQuery, state: FSMContext) -> bool:
        from handlers.user.user_class import User
        if not await User._if_subscribshed(call.from_user.id):
            search_categoru = await DB_categories_product.get_search_history_user(call.from_user.id, call.message.date)
            if search_categoru and len(search_categoru) >= 3:
                await self.mssage_answer(call, 'Вы уже совершили поиск сегодня 3 раза! Оплатите подписку или приходите завтра.')
                await User.seller(call, state)
                return False
        return True
    
    async def _initialize_categories_search_data_state(self, call: types.CallbackQuery, state: FSMContext):
        from database.categories_product import Categories_product_database
        data_state = await state.get_data()
        data_state['categories_search_category_one_level'] = None
        data_state['categories_search_category_two_level'] = None
        data_state['categories_search_category_three_level'] = None
        all_categories = await Categories_product_database.get_all_categories()
        data_state['all_categories'] = all_categories
        await state.update_data(data_state)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Выберите категорию'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="buyer"))
        unique_categories = list(set(subarray[1] for subarray in data_state['all_categories']))
        for category in unique_categories:
            if 64 > len(category.encode('utf-8')):
                builder.row(types.InlineKeyboardButton(text=category, callback_data=category))
        return builder
    
    async def _go_to_next_step(self, message: types.Message, state: FSMContext):
        await categories_search_category_two_level().start_of_step(message, state)

class categories_search_category_two_level (Steps_base):
    def __init__(self):
        name = 'category_two_level'
        module = 'categories_search'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Выберите категорию'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="buyer"))
        unique_categories = list(set(subarray[2] for subarray in data_state['all_categories'] if subarray[1] == data_state['categories_search_category_one_level']))
        for category in unique_categories:
            if 64 > len(category.encode('utf-8')):
                builder.row(types.InlineKeyboardButton(text=category, callback_data=category))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        await categories_search_category_three_level().start_of_step(call, state)

class categories_search_category_three_level (Steps_base):
    def __init__(self):
        name = 'category_three_level'
        module = 'categories_search'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Выберите категорию'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_categories_search"))
        unique_categories = list(set(subarray[3] for subarray in data_state['all_categories'] if subarray[2] == data_state['categories_search_category_two_level']))
        for category in unique_categories:
            if 64 > len(category.encode('utf-8')):
                builder.row(types.InlineKeyboardButton(text=category, callback_data=category))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        await categories_search_confirm().start_of_step(call, state)

class categories_search_confirm (Steps_base):
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
        data_state = await state.get_data()
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

        
        


