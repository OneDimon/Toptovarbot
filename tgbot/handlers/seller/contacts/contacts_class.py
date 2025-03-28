from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import BaseHandler, StepsBase
from database.seller.contacts import ContactsDatabase as DB_contacts


class Contacts (BaseHandler):

    @staticmethod
    async def if_contacts(user_id: int) -> bool:
        all_contacts = await DB_contacts.get_all_contacts(user_id)
        return len(all_contacts) > 0

    
    @staticmethod
    async def get_all_contacts(user_id: int):
        all_contacts = await DB_contacts.get_all_contacts(user_id)
        all_contacs_dict = {}
        for contact in all_contacts:
            if contact['contacts_type'] in all_contacs_dict:
                all_contacs_dict[contact['contacts_type']].append({'id' : contact['id'], 'user_id' : contact['user_id'], 'contacts' : contact['contacts']})
            else:
                all_contacs_dict[contact['contacts_type']] = [{'id' : contact['id'], 'user_id' : contact['user_id'], 'contacts' : contact['contacts']}]

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
        await BaseHandler.message_answer(call, text, keyboard)

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
                telegram += ' ' + contact_telegram['contacts']

        if 'whatsapplink' in all_contacts and all_contacts['whatsapplink']:
            for contact_whatsapp_link in all_contacts['whatsapplink']:
                whatsapp_link += ' ' + contact_whatsapp_link['contacts']

        if 'adminvklink' in all_contacts and all_contacts['adminvklink']:
            for contact_phone in all_contacts['adminvklink']:
                admin_vk_link += ' ' + contact_phone['contacts']

        return f"{text} Телеграм: {telegram} \n WhatsAppLink: {whatsapp_link} \n ссылка на админ страницу вк: {admin_vk_link}"
    
    @staticmethod
    async def back_contacts(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_contacts'].pop()
        func = data_state['ar_func_contacts'][-1]
        await func(call, state)