from aiogram import types
from aiogram.fsm.context import FSMContext
from database.loader.location_loader import LocationLoaderDatabase as DB_location
from handlers.base_handler_class import BaseHandler


class Location (BaseHandler):
    @staticmethod
    async def if_location(user_id : int) -> bool:
        location_data = await DB_location.get_location(user_id)
        if location_data:
            return True
        else:
            return False
        
    @staticmethod
    async def get_location(user_id : int) -> list:
        return await DB_location.get_location(user_id)
        
    @staticmethod
    async def back_location(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_location_loader'].pop()
        func = data_state['ar_func_location_loader'][-1]
        await func(call, state)





