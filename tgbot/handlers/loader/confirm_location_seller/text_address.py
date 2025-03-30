from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from config_data.config import *

class TextAddress (StepsBase):
    def __init__(self):
        name = 'text_address'
        module = 'confirm_location_seller'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        return 'Введите адрес продавца текстом, например: место: РК Садовод, сектор: Крытый вещевой рынок, здание: 1, этаж: 1, ряд 1, место 1.'
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_confirm_location_seller"))
        return builder
        
    async def _go_to_next_step(self, message: types.Message, state: FSMContext): 
        """Переходим к следующему шагу - загрузке фото"""
        from . import Photo
        await Photo().start_of_step(message, state)


