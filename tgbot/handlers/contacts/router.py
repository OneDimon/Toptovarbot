from aiogram import *
from aiogram.fsm.context import FSMContext
from aiogram.filters.command import Command
from states.states import contacts as StateContacts
from handlers.contacts import contacts_class


contacts_router = Router()

contacts_router.callback_query.register(contacts_class.Contacts.contacts_menu, lambda c: c.data == 'contacts_menu')
contacts_router.callback_query.register(contacts_class.Contacts.back_contacts, lambda c: c.data == 'back_contacts')

contacts_router.callback_query.register(contacts_class.Contacts_type('telegram').start_of_step, lambda c: c.data == 'contacts_telegram')
contacts_router.callback_query.register(contacts_class.Contacts_type('whatsapplink').start_of_step, lambda c: c.data == 'contacts_whatsapp_link')
contacts_router.callback_query.register(contacts_class.Contacts_type('admin_vk_link').start_of_step, lambda c: c.data == 'contacts_admin_vk_link')

contacts_router.callback_query.register(contacts_class.Contacts_type('telegram').get_answer, StateContacts.telegram)
contacts_router.callback_query.register(contacts_class.Contacts_type('whatsapplink').get_answer, StateContacts.whatsapplink)
contacts_router.callback_query.register(contacts_class.Contacts_type('admin_vk_link').get_answer, StateContacts.admin_vk_link)

contacts_router.callback_query.register(contacts_class.Contact_edit_or_delete().get_answer, StateContacts.edit_or_delete)

contacts_router.callback_query.register(contacts_class.Contact_edit().get_answer, StateContacts.edit)
contacts_router.message.register(contacts_class.Contact_edit().get_answer, StateContacts.edit)


contacts_router.callback_query.register(contacts_class.Contact_delete().get_answer, StateContacts.delete)
contacts_router.message.register(contacts_class.Contact_delete().get_answer, StateContacts.delete)

contacts_router.callback_query.register(contacts_class.Contact_add().get_answer, StateContacts.add)
contacts_router.message.register(contacts_class.Contact_add().get_answer, StateContacts.add)



