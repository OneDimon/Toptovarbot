from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from states.states import contacts as StateContacts
from handlers.base_handler_class import Base_hanler, Steps_base
from aiogram.types import FSInputFile
from database.contacts import Contacts_database as DB_contacts


class Contacts (Base_hanler):

    @staticmethod
    async def if_contacts(user_id: int) -> bool:
        all_contacts = await DB_contacts.get_all_contacts(user_id)
        return len(all_contacts) > 0

    
    @staticmethod
    async def get_all_contacts(user_id: int):
        all_contacts = await DB_contacts.get_all_contacts(user_id)
        all_contacs_dict = {}
        for contact in all_contacts:
            if contact[3] in all_contacs_dict:
                all_contacs_dict[contact[3]].append({'id' : contact[0], 'user_id' : contact[1], 'contact' : contact[2]})
            else:
                all_contacs_dict[contact[3]] = [{'id' : contact[0], 'user_id' : contact[1], 'contact' : contact[2]}]

        return all_contacs_dict
    
    @staticmethod
    async def contacts_menu(call: types.CallbackQuery, state: FSMContext):
        all_contacts = await Contacts.get_all_contacts(call.from_user.id)
        data_state = await state.get_data()
        data_state['all_contacts'] = all_contacts
        await state.update_data(data_state)
        await Contacts.__send_contacts_menu(call, state)

    @staticmethod
    async def __send_contacts_menu(call: types.CallbackQuery, state: FSMContext):
        keyboard = await Contacts.__get_contacts_menu_keyboard(call, state)
        text = await Contacts.__get_contacts_menu_text(call, state)
        await Base_hanler.mssage_answer(call, text, keyboard)

    @staticmethod
    async def __get_contacts_menu_keyboard(call: types.CallbackQuery, state: FSMContext):
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="✏️ Отредактировать/добавить ссылку на Telegram", callback_data="contacts_telegram"))
        builder.row(types.InlineKeyboardButton(text="📲 Отредактировать/добавить WhatsAppPhone", callback_data="contacts_whatsapp_link"))
        builder.row(types.InlineKeyboardButton(text="🔗 Отредактировать/добавить ссылку на админ страницу ВК", callback_data="contacts_admin_vk_link"))
        builder.row(types.InlineKeyboardButton(text="✅ Завершить добавление/редактирование", callback_data="seller"))
        return builder.as_markup()
    

    @staticmethod
    async def __get_contacts_menu_text(call: types.CallbackQuery, state: FSMContext):
        data_state = await state.get_data()
        all_contacts = data_state['all_contacts']
        text = 'Добавьте ваши контакты. \n  Для продолжения использования функционала продавца необходимо добавить хотя бы 1 контакт. \n'
        telegram = ''
        whatsapp_link = ''
        admin_vk_link = ''
        if 'telegram' in all_contacts and all_contacts['telegram']:
            for contact_telegram in all_contacts['telegram']:
                telegram += ' ' + contact_telegram['contact']

        if 'whatsapplink' in all_contacts and all_contacts['whatsapplink']:
            for contact_whatsapp_link in all_contacts['whatsapplink']:
                whatsapp_link += ' ' + contact_whatsapp_link['contact']

        if 'admin_vk_link' in all_contacts and all_contacts['admin_vk_link']:
            for contact_phone in all_contacts['admin_vk_link']:
                admin_vk_link += ' ' + contact_phone['contact']

        return f"{text} Телеграм: {telegram} \n WhatsAppLink: {whatsapp_link} \n ссылка на админ страницу вк: {admin_vk_link}"
    
    @staticmethod
    async def back_contacts(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_contacts'].pop()
        func = data_state['ar_func_contacts'][-1]
        await func(call, state)


class Contacts_type(Steps_base):
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
            await Contact_add(id).start_of_step(call, state)
            return
        try:
            float(id)   
            await Contact_edit_or_delete(id).start_of_step(call, state)
        except:
            await Contacts.contacts_menu(call, state)

class Contact_add(Steps_base):
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

    async def _before_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        self.type = data_state['contact_type']

    async def _after_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if type(call) == types.Message:
            contact = call.text
            await DB_contacts.add_contact(call.from_user.id, contact, self.type)
    
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await Contacts.contacts_menu(call, state)

class Contact_edit_or_delete(Steps_base):
    def __init__(self, id = 0):
        name = 'edit_or_delete'
        module = 'contacts'
        super().__init__(name, module)
        self.id = id
        
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        contact = await DB_contacts.get_contact(self.id)
        text = f'Выберите действие с {contact[0][2]} контактом \n'
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
            await Contact_delete(self.id).start_of_step(call, state)
        elif call.data == 'edit_contact':
            await Contact_edit(self.id).start_of_step(call, state)

class Contact_edit(Steps_base):
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
        await Contacts.contacts_menu(call, state)

    async def _after_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if type(call) == types.Message:
            await DB_contacts.edit_contact(self.id, call.text)

class Contact_delete(Steps_base):
    def __init__(self, id = 0):
        name = 'delete'
        module = 'contacts'
        super().__init__(name, module)
        self.id = id

    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        contact = await DB_contacts.get_contact(self.id)
        text = f'Вы хотите удалить {contact[0][2]} контакт'
        return text
    
    async def _before_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        self.id = data_state['contact_id']
        return await super()._before_get_answer(call, state)
    
    async def _after_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        date_state = await state.get_data()
        date_state['contact_id'] = self.id
        await state.update_data(date_state)
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text='⬅️ назад', callback_data='back_contacts'))
        builder.row(types.InlineKeyboardButton(text='🗑️ удалить', callback_data=f'delete_contact_confirm'))
        return builder
    
    async def _after_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if type(call) == types.CallbackQuery and call.data == 'delete_contact_confirm':
            await DB_contacts.delete_contact(self.id)
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await Contacts.contacts_menu(call, state)

