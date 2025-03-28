from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from database.seller.contacts import ContactsDatabase as DB_contacts

class Edit(StepsBase):
    def __init__(self, id = 0):
        name = 'edit'
        module = 'contacts'
        super().__init__(name, module)
        self.id = id

    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        text = f'Введите новые данные'
        return text
    

    async def _after_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        date_state = await state.get_data()
        if self.id != 0:
            date_state['contact_id'] = self.id
            await state.update_data(date_state)

    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_contacts"))
        return builder
    
    async def _before_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        self.id = data_state['contact_id']
        return await super()._before_get_answer(call, state)

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext): 
        from . import Contacts
        await Contacts.contacts_menu(call, state)

    async def _after_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if type(call) == types.Message:
            await DB_contacts.edit_contact(self.id, call.text)