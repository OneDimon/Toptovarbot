from aiogram import types
from aiogram.fsm.context import FSMContext
from config_data.config import *

from handlers.base_handler_class import Base_hanler

class Publication_product (Base_hanler):

    @staticmethod
    async def back_publication_product(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_publication_product'].pop()
        func = data_state['ar_func_publication_product'][-1]
        await func(call, state)
        
         




        

        