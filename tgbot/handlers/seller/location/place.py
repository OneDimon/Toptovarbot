from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import  StepsBase

class Place(StepsBase):
    def __init__(self):
        name = 'place'
        module = 'location'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели, " + data_state[self.key_data_in_state] + "\n" + "Введите место или оставьте текущее." 
        else:
            return "Место?"
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⏭️ Пропустить", callback_data="skip"))
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(text="💾 Оставить текущее", callback_data="current"))
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_location"))
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from . import Photo
        await Photo().start_of_step(call, state)