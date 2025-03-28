from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from config_data.config import *

class NameSeller (StepsBase):
    def __init__(self):
        name = 'name_seller'
        module = 'confirm_location_seller'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Отправьте ник продавца в телеграмм или один из контактов, которые он внес в систему'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_confirm_location_seller"))
        return builder
    
    async def _before_get_answer(self, mess: types.Message, state: FSMContext):
        from . import ConfirmLocationSeller
        data_seller = await ConfirmLocationSeller.get_seller_data(mess.text.strip())
        if (data_seller):
            data_state = await state.get_data()
            data_state['seller_data'] = data_seller
            await state.update_data(data_state)
        else:
            await mess.answer(text='Не удалось найти продавца по вашему запросу. Проверьте правильность введенных контактов.', show_alert=True)
            return True
        
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from . import TextAddress
        await TextAddress().start_of_step(call, state)