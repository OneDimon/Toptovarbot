from aiogram import *
from . import *
from states.states import Contacts as StateContacts
from globals import CustomLogger


contacts_router = Router()

contacts_router.callback_query.register(Contacts.contacts_menu, lambda c: c.data == 'contacts_menu')
contacts_router.callback_query.register(Contacts.back_contacts, lambda c: c.data == 'back_contacts')

contacts_router.callback_query.register(SelectType('telegram').start_of_step, lambda c: c.data == 'contacts_telegram')
contacts_router.callback_query.register(SelectType('whatsapplink').start_of_step, lambda c: c.data == 'contacts_whatsapp_link')
contacts_router.callback_query.register(SelectType('admin_vk_link').start_of_step, lambda c: c.data == 'contacts_admin_vk_link')

contacts_router.callback_query.register(SelectType('telegram').get_answer, StateContacts.telegram)
contacts_router.callback_query.register(SelectType('whatsapplink').get_answer, StateContacts.whatsapplink)
contacts_router.callback_query.register(SelectType('admin_vk_link').get_answer, StateContacts.admin_vk_link)

contacts_router.callback_query.register(EditOrDelete().get_answer, StateContacts.edit_or_delete)

contacts_router.callback_query.register(Edit().get_answer, StateContacts.edit)
contacts_router.message.register(Edit().get_answer, StateContacts.edit)

contacts_router.callback_query.register(Delete().get_answer, StateContacts.delete)
contacts_router.message.register(Delete().get_answer, StateContacts.delete)

contacts_router.callback_query.register(Add().get_answer, StateContacts.add)
contacts_router.message.register(Add().get_answer, StateContacts.add)

contacts_router.error.register(CustomLogger('logs/error_logs/contacts.log').loging_hanlder_errors)



