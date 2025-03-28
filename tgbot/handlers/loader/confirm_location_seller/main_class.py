from aiogram import types
from aiogram.fsm.context import FSMContext
from config_data.config import *
from handlers.base_handler_class import BaseHandler


class ConfirmLocationSeller (BaseHandler):
    @staticmethod
    async def back_confirm_location_seller(call : types.CallbackQuery, state : FSMContext):
        """Обработчик для кнопки "Назад" в процессе подтверждения местоположения продавца"""
        data_state = await state.get_data()
        
        # Проверяем наличие массива функций
        if 'ar_func_confrirm_location_seller' not in data_state or not data_state['ar_func_confrirm_location_seller']:
            # Если массива нет или он пуст, возвращаемся в меню загрузчика
            from handlers.general.user.user_class import User
            await User.loader(call, state)
            return
            
        # Удаляем текущую функцию из массива
        data_state['ar_func_confrirm_location_seller'].pop()
        
        # Если массив функций не пуст, вызываем предыдущую функцию
        if data_state['ar_func_confrirm_location_seller']:
            func = data_state['ar_func_confrirm_location_seller'][-1]
            await func(call, state)
        else:
            # Если массив пуст, возвращаемся в меню загрузчика
            from handlers.general.user.user_class import User
            await User.loader(call, state)

    @staticmethod
    async def get_seller_data(contact_or_name_seller: str):
        """Получение данных продавца по его контакту или имени"""
        from database.loader.confirm_location_seller import ConfirmLocationSellerDatabase as DB
        data_user = await DB.get_seller_data(contact_or_name_seller)
        if data_user and data_user.get('id') and data_user.get('name_of_place') and data_user.get('contacts'):
            return data_user
        else:
            return False

    