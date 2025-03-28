from aiogram import types
from aiogram.fsm.context import FSMContext
from database.seller.request_response_seller.request_response_seller import RequestResponseSellerDatabase as DB_request_response
from handlers.base_handler_class import BaseHandler
from config_data.config import *

class SellerSurvey (BaseHandler):
    @staticmethod
    async def back_seller_survey(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_seller_survey'].pop()
        func = data_state['ar_func_seller_survey'][-1]
        await func(call, state)

