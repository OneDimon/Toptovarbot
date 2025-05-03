from aiogram import Router
from . import *
from states.states import LocationConfirmation as StateLocation
from globals.logger_class import CustomLogger
from aiogram.filters import StateFilter

location_confirmation_router = Router()
location_confirmation_router.callback_query.register(Confirmation().start_of_step, lambda c: c.data == 'admin_location_confirmations')
location_confirmation_router.callback_query.register(Confirmation().get_answer, StateLocation.confirmation)
location_confirmation_router.message.register(Comment().get_answer, StateLocation.comment)
location_confirmation_router.error.register(CustomLogger('logs/error_logs/admin/location_confirmation.log').loging_hanlder_errors, StateFilter(StateLocation))