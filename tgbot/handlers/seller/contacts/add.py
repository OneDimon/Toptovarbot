from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from database.seller.contacts import ContactsDatabase as DB_contacts

class Add(StepsBase):
    def __init__(self, type = 0):
        name = 'add'
        module = 'contacts'
        self.type = type
        super().__init__(name, module)

    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        text = f'Введите контакт, который хоттите добавить'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_contacts"))
        return builder
    
    async def _after_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        date_state = await state.get_data()
        if self.type != 0:
            date_state['contact_type'] = self.type
            await state.update_data(date_state)

    async def _after_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if type(call) == types.Message:
            contact = call.text
            await DB_contacts.add_contact(call.from_user.id, contact, self.type)
    
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from . import Contacts
        await Contacts.contacts_menu(call, state)
