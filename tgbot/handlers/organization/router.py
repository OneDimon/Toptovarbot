from aiogram import *
from aiogram.fsm.context import FSMContext
from aiogram.filters.command import Command
from states.states import organization as StateOrganization
from handlers.organization import organization_class
from aiogram.utils.keyboard import InlineKeyboardBuilder

organization_router = Router()

organization_router.callback_query.register(organization_class.Organization().start_of_step, lambda c: c.data == 'organization')
organization_router.callback_query.register(organization_class.Organization().get_answer, StateOrganization.organization)