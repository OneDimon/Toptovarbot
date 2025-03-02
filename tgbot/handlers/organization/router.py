from aiogram import *
from states.states import Organization as StateOrganization
from handlers.organization import organization_class
from globals import CustomLogger

organization_router = Router()

organization_router.callback_query.register(organization_class.Organization().start_of_step, lambda c: c.data == 'organization')
organization_router.callback_query.register(organization_class.Organization().get_answer, StateOrganization.organization)
organization_router.message.register(organization_class.Organization().get_answer, StateOrganization.organization)
organization_router.error.register(CustomLogger('logs/error_logs/organization.log').loging_hanlder_errors)
