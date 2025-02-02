from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.categories_product import Categories_product_database as DB_categories_product
from handlers.base_handler_class import  Steps_base
from config_data.config import *
import asyncio

class Confirm(Steps_base):
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
        
