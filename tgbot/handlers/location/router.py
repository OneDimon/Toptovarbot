from aiogram import *
from aiogram.fsm.context import FSMContext
from aiogram.filters.command import Command
from states.states import location as StateLocation
from handlers.location import location_class
from aiogram.utils.keyboard import InlineKeyboardBuilder


location_router = Router()

location_router.callback_query.register(location_class.Location.back_location, lambda c: c.data == 'back_location')
location_router.callback_query.register(location_class.Location_name().start_of_step, lambda c: c.data == 'location')

location_router.callback_query.register(location_class.Location_name().get_answer, StateLocation.name)

location_router.callback_query.register(location_class.Location_sector().get_answer, StateLocation.sector)

location_router.message.register(location_class.Location_building().get_answer, StateLocation.building)
location_router.callback_query.register(location_class.Location_building().get_answer, StateLocation.building)

location_router.message.register(location_class.Location_floar().get_answer, StateLocation.floar)
location_router.callback_query.register(location_class.Location_floar().get_answer, StateLocation.floar)

location_router.message.register(location_class.Location_place().get_answer, StateLocation.place)
location_router.callback_query.register(location_class.Location_place().get_answer, StateLocation.place)

location_router.message.register(location_class.Location_line().get_answer, StateLocation.line)
location_router.callback_query.register(location_class.Location_line().get_answer, StateLocation.line)

location_router.message.register(location_class.Location_address().get_answer, StateLocation.address)
location_router.callback_query.register(location_class.Location_address().get_answer, StateLocation.address)

location_router.message.register(location_class.Location_photo().get_answer, StateLocation.photo)
location_router.callback_query.register(location_class.Location_photo().get_answer, StateLocation.photo)

location_router.callback_query.register(location_class.location_description().get_answer, StateLocation.description)