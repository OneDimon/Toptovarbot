from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import BaseHandler, StepsBase
from database.seller.contacts import ContactsDatabase as DB_contacts

class EditOrDelete(StepsBase):
    def __init__(self, id = 0):
        name = 'edit_or_delete'
        module = 'contacts'
        super().__init__(name, module)
        self.id = id
        
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        contact = await DB_contacts.get_contact(self.id)
        text = f"Выберите действие с {contact['contacts']} контактом \n"
        text += f'Вы хотите удалить или отредактировать данный контакт'
        return text
    
    async def _after_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        date_state = await state.get_data()
        if self.id != 0:
            date_state['contact_id'] = self.id
            await state.update_data(date_state)
    
    async def _before_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        self.id = data_state['contact_id']
        return await super()._before_get_answer(call, state)
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🗑️ Удалить", callback_data="delete_contact"))
        builder.row(types.InlineKeyboardButton(text="✏️ Редактировать", callback_data="edit_contact"))
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_contacts"))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        if call.data == 'delete_contact':
            from . import Delete
            await Delete(self.id).start_of_step(call, state)
        elif call.data == 'edit_contact':
            from . import Edit
            await Edit(self.id).start_of_step(call, state)