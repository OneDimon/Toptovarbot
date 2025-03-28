from aiogram import *
from states.states import Organization as StateOrganization
from handlers.seller.organization.organization_class import Organization
from globals.logger_class import CustomLogger

organization_router = Router()

organization_router.callback_query.register(Organization().start_of_step, lambda c: c.data == 'organization')
organization_router.callback_query.register(Organization().get_answer, StateOrganization.organization)
organization_router.message.register(Organization().get_answer, StateOrganization.organization)
organization_router.error.register(CustomLogger('logs/error_logs/organization.log').loging_hanlder_errors)
