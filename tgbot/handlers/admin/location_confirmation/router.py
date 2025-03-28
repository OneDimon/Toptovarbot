from aiogram import Router
from . import LocationConfirmation

location_confirmation_router = Router()

location_confirmation_router.callback_query.register(LocationConfirmation.menu, lambda c: c.data == 'admin_location_confirmations')
