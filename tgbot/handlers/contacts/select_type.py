from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from database.contacts import ContactsDatabase as DB_contacts

class SelectType(StepsBase):
    def __init__(self, name = 'telegram'):
        module = 'contacts'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        text = f'Выберите {self.name} контакт, который хоттите отредактировать или удалить'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        contacs_type = await DB_contacts.get_type_contacts(call.from_user.id, self.name)
        builder = InlineKeyboardBuilder()

        for contact in contacs_type:
            builder.row(types.InlineKeyboardButton(text=f"✏️ {contact[2]}", callback_data=f"edit_contact_{contact[0]}"))
        builder.row(types.InlineKeyboardButton(text="➕ Добавить", callback_data=f"add_contact_{self.name}"))
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="contacts_menu"))

        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        data_state = await state.get_data()
        id = call.data.split('_')[-1]
        method = call.data.split('_')[0]
        if method == 'add':
            from . import Add
            await Add(id).start_of_step(call, state)
            return
        try:
            float(id)   
            from . import EditOrDelete
            await EditOrDelete(id).start_of_step(call, state)
        except:
            from . import Contacts
            await Contacts.contacts_menu(call, state)