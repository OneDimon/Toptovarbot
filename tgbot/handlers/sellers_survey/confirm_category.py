from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import Steps_base
from config_data.config import *

class Confirm_category (Steps_base):
    def __init__(self):
        name = 'confirm_category'
        module = 'seller_survey'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Вы сделали свой выбор'
        data_state = await state.get_data()
        text += '\n' + data_state['seller_survey_category_one_level'] + '\n' + data_state['seller_survey_category_two_level'] + '\n' + data_state['seller_survey_category_three_level']
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_seller_survey"))
        builder.row(types.InlineKeyboardButton(text="Подтвердить", callback_data="confirm_seller_survey"))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from . import Photo
        await Photo().start_of_step(call, state)


