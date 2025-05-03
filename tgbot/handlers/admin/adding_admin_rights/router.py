from aiogram import Router
from . import * 
from states.states import AddingAdminRights 
from aiogram.filters import StateFilter

adding_admin_rights_router = Router()
adding_admin_rights_router.callback_query.register(Add().start_of_step, lambda c: c.data == 'adding_admin_rights')
adding_admin_rights_router.message.register(Add().get_answer, AddingAdminRights.add)