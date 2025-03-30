from aiogram import types
from handlers.base_handler_class import StepsBase
from aiogram.fsm.context import FSMContext
from aiogram.utils.keyboard import InlineKeyboardBuilder

class LocationConfirmationMain(StepsBase):
    @staticmethod
    async def back_confirm_location_seller(call : types.CallbackQuery, state : FSMContext):
        """Обработчик для кнопки "Назад" в процессе подтверждения местоположения продавца"""
        data_state = await state.get_data()
        
        # Проверяем наличие массива функций
        if 'ar_func_location_confirmation' not in data_state or not data_state['ar_func_location_confirmation']:
            # Если массива нет или он пуст, возвращаемся в меню загрузчика
            from handlers.admin.menu.main_class import AdminMenu
            await AdminMenu.admin_menu(call, state)
            return
            
        # Удаляем текущую функцию из массива
        data_state['ar_func_location_confirmation'].pop()
        
        # Если массив функций не пуст, вызываем предыдущую функцию
        if data_state['ar_func_location_confirmation']:
            func = data_state['ar_func_location_confirmation'][-1]
            await func(call, state)
        else:
            # Если массив пуст, возвращаемся в меню загрузчика
            from handlers.admin.menu.main_class import AdminMenu
            await AdminMenu.admin_menu(call, state)