from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from states.states import seller_survey as State_seller_survey
from database.categories_product import Categories_product_database as DB_categories_product
from database.request_response_seller.request_response_seller import Request_response_seller_database as DB_request_response
from handlers.base_handler_class import Base_hanler, Steps_base
from modules.photo_verification_modules import Photo_verification_modules
from aiogram.types import FSInputFile
from config_data.config import *
import numpy as np
from datetime import datetime
import asyncio

class seller_survey (Base_hanler):
    @staticmethod
    async def back_seller_survey(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_seller_survey'].pop()
        func = data_state['ar_func_seller_survey'][-1]
        await func(call, state)

class seller_survey_category_one_level (Steps_base):
    def __init__(self):
        name = 'category_one_level'
        module = 'seller_survey'
        super().__init__(name, module)

    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        if not await self._if_option_search(call, state):
            return True
        await self._initialize_seller_survey_data_state(call, state)

            
    async def _if_option_search(self, call: types.CallbackQuery, state: FSMContext) -> bool:
        from handlers.user.user_class import User
        if not await User._if_subscribshed(call.from_user.id):
            seller_survey = await DB_request_response().get_seller_survey(call.from_user.id)  
            if seller_survey and len(seller_survey) >= 3:
                self.mssage_answer(call, 'Вы уже совершили опрос! Оплатите подписку или приходите завтра.')
                User.buyer(call, state)
                return False
        return True
    
    async def _initialize_seller_survey_data_state(self, call: types.CallbackQuery, state: FSMContext):
        from database.categories_product import Categories_product_database
        data_state = await state.get_data()
        data_state['seller_survey_category_one_level'] = None
        data_state['seller_survey_category_two_level'] = None
        data_state['seller_survey_category_three_level'] = None
        data_state['seller_survey_photo'] = None
        data_state['seller_survey_name_product'] = None
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
        await seller_survey_category_two_level().start_of_step(message, state)

class seller_survey_category_two_level (Steps_base):
    def __init__(self):
        name = 'category_two_level'
        module = 'seller_survey'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Выберите категорию'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_seller_survey"))
        unique_categories = list(set(subarray[2] for subarray in data_state['all_categories'] if subarray[1] == data_state['seller_survey_category_one_level']))
        for category in unique_categories:
            if 64 > len(category.encode('utf-8')):
                builder.row(types.InlineKeyboardButton(text=category, callback_data=category))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        await seller_survey_category_three_level().start_of_step(call, state)

class seller_survey_category_three_level (Steps_base):
    def __init__(self):
        name = 'category_three_level'
        module = 'seller_survey'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Выберите категорию'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_seller_survey"))
        unique_categories = list(set(subarray[3] for subarray in data_state['all_categories'] if subarray[2] == data_state['seller_survey_category_two_level']))
        for category in unique_categories:
            if 64 > len(category.encode('utf-8')):
                builder.row(types.InlineKeyboardButton(text=category, callback_data=category))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        await seller_survey_confirm_category().start_of_step(call, state)

class seller_survey_confirm_category (Steps_base):
    def __init__(self):
        name = 'confirm_category'
        module = 'seller_survey'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Вы сделали свой выбор'
        data_state = await state.get_data()
        text += '\n' + data_state['seller_survey_category_one_level'] + '\n' + data_state['seller_survey_category_two_level'] + '\n' + data_state['seller_survey_category_three_level']
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_seller_survey"))
        builder.row(types.InlineKeyboardButton(text="Подтвердить", callback_data="confirm_seller_survey"))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        await seller_survey_photo().start_of_step(call, state)

class seller_survey_photo(Steps_base):
    def __init__(self):
        name = 'photo'
        module = 'seller_survey'
        super().__init__(name, module)

    async def _before_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        if "number_of_attempts" in data_state:
            data_state["number_of_attempts"] += 1
        else:
            data_state["number_of_attempts"] = 1
        await state.update_data(data_state)
        from modules.photo_verification_modules import Photo_verification_modules
        photo_id = await Photo_verification_modules.photo_verification(call, data_state["number_of_attempts"])
        if photo_id:
            data_state['seller_survey_photo_id'] = photo_id
            await state.update_data(data_state)
            return
        else:
            return True
    
    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
       data_state = await state.get_data()
       if 'seller_survey_photo_id' not in data_state:
           return
       await call.bot.download(data_state['seller_survey_photo_id'], F"img/{data_state['seller_survey_photo_id']}.jpg")
       data_state[self.key_data_in_state] = F"img/{data_state['seller_survey_photo_id']}.jpg"
       await state.update_data(data_state)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            photo = FSInputFile(data_state[self.key_data_in_state])
            await call.bot.send_photo(call.from_user.id, photo)
            return "вы отправили данную фотографию, " "\n" + "Отпрвьте новую фотграфию или оставьте текущую." 
        else:
            return f"Отправьте фотографию товара"
            
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_seller_survey")
        )
        return builder
            
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await seller_survey_name_product().start_of_step(call, state)


class seller_survey_name_product(Steps_base):
    def __init__(self):
        name = 'name_product'
        module = 'seller_survey'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели, " + data_state[self.key_data_in_state] + "\n" + "Введите название товара или оставьте текущее" 
        else:
            return "Название вашего продукта?"
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_seller_survey")
        )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await seller_survey_confirm().start_of_step(call, state)


class seller_survey_confirm(Steps_base):
    def __init__(self):
        name = 'confirm'
        module = 'seller_survey'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        return "Проверьте данные, которые вы ввели"
        
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Отправить запрос продавцам", callback_data="send_seller_survey")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_seller_survey")
        )
        return builder

    async def _after_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        await self.__message_answer_buyer(call, state)
        await self.__get_sellers_id(call, state)
        hash_result = await self.__send_query_to_seller(call, state)
        await state.clear()
        await asyncio.sleep(900)
        await self.__message_answer_15_min(call, state, hash_result)
        await asyncio.sleep(900)
        await self.__message_answer_30_min(call, state, hash_result)

    async def __message_answer_buyer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Вернуться в меню покупателя", callback_data="buyer")
            )
        text = 'Результат запроса будет Вам предоставлен через 15 минут(предварительный) и еще 15 минут будет пополняться'
        await self.mssage_answer(call, text, builder.as_markup())

    async def __get_sellers_id(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        users_id = await DB_categories_product.get_user_id_from_categories(data_state['seller_survey_category_one_level'], 
                                                                           data_state['seller_survey_category_two_level'], 
                                                                           data_state['seller_survey_category_three_level'])
        data_state['seller_survey_sellers_id'] = []
        data_state['seller_survey_sellers_id'].append([x[0] for x in users_id])

        await state.update_data(data_state)

    async def __send_query_to_seller(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from datetime import datetime
        from handlers.request_response_seller import request_seller
        data_state = await state.get_data()
        request_seller_obj = request_seller.Request_seller()
        now = datetime.now()
        hash_request = await request_seller_obj.set_request_seller(call.from_user.id,
                                                    data_state['seller_survey_sellers_id'][0], 
                                                    data_state['seller_survey_name_product'],
                                                    now.strftime("%Y-%m-%d %H:%M:%S"),
                                                    data_state['seller_survey_category_three_level'],
                                                    data_state['seller_survey_photo'])
        return hash_request
    

    async def __message_answer_15_min(self, call: types.CallbackQuery | types.Message, state: FSMContext, hash_result):
        text = "по данной ссылке вы можете посмтреть промежуточный результат опроса продавцов: " + 'http://tovartest.ru/response_seller/?hash=' + hash_result
        await self.mssage_answer(call, text)

    async def __message_answer_30_min(self, call: types.CallbackQuery | types.Message, state: FSMContext, hash_result):
        text = "по данной ссылке вы можете посмтреть окнчательный результат опроса продавцов: " + 'http://tovartest.ru/response_seller/?hash=' + hash_result
        await self.mssage_answer(call, text)
        
