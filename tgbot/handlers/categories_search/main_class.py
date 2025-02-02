from aiogram import types
from aiogram.fsm.context import FSMContext
from config_data.config import *
from handlers.base_handler_class import Base_hanler


class Categories_search (Base_hanler):
    @staticmethod
    async def back_categories_search(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_categories_search'].pop()
        func = data_state['ar_func_categories_search'][-1]
        await func(call, state)