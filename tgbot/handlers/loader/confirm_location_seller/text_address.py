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

    async def _before_get_answer(self, message: types.Message, state: FSMContext):
        """Валидация введенного адреса (опционально)"""
        # Здесь можно добавить валидацию, если необходимо
        # В текущей реализации просто пропускаем любой текст
        text_address = message.text.strip()
        if not text_address:
            await message.answer("Пожалуйста, введите текстовый адрес")
            return True
        return False
        
    async def _save_answer_data(self, message: types.Message, state: FSMContext):
        """Сохраняем введенный адрес в состояние"""
        data_state = await state.get_data()
        data_state[self.key_data_in_state] = message.text.strip()
        await state.update_data(data_state)

    async def _go_to_next_step(self, message: types.Message, state: FSMContext): 
        """Переходим к следующему шагу - загрузке фото"""
        from . import Photo
        await Photo().start_of_step(message, state)


