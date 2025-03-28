from aiogram import types
from handlers.base_handler_class import StepsBase
from aiogram.fsm.context import FSMContext
from aiogram.utils.keyboard import InlineKeyboardBuilder

class LocationConfirmationMain(StepsBase):
    def __init__(self):
        name = 'main'
        module = 'location_confirmation'
        super().__init__(name, module)

    async def _get_text_for_question(self, call: types.CallbackQuery, state: FSMContext):
        text = 'Пожалуйста, подтвердите или отмените локацию'
        
        return text

    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery, state: FSMContext):
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Подтвердить локацию", callback_data="confirm_location"))
        builder.row(types.InlineKeyboardButton(text="Отменить локацию", callback_data="cancel_location"))
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_admin_menu"))
        return builder


