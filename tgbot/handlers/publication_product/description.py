from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import  StepsBase
from config_data.config import *

class Description (StepsBase):
    def __init__(self):
        name = 'description'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Напишите описание вашего товара'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_publication_product"))
        return builder
    
    async def _go_to_next_step(self, message: types.Message, state: FSMContext):
        from . import CategoriesInline
        await CategoriesInline().start_of_step(message, state)
