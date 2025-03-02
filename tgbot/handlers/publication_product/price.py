from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from config_data.config import *

class Price (StepsBase):
    def __init__(self):
        name = 'price'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Укажите цену товара в рублях целым числом например: 1000'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_publication_product"))
        return builder
    
    async def _before_get_answer(self, call, state):
        if not call.text.isdigit():
            await self.mssage_answer(call, 'Вы ввели не число')
            return True
    
    async def _go_to_next_step(self, message: types.Message, state: FSMContext):
        from . import Photo
        await Photo().start_of_step(message, state)


