from aiogram import *
from states.states import LocationLoader as StateLocation
from . import *
from globals import CustomLogger


location_router = Router()

location_router.callback_query.register(Location.back_location, lambda c: c.data == 'back_location_loader')
location_router.callback_query.register(Name().start_of_step, lambda c: c.data == 'location_loader')

location_router.callback_query.register(Name().get_answer, StateLocation.name)

location_router.callback_query.register(Sector().get_answer, StateLocation.sector)

location_router.message.register(Building().get_answer, StateLocation.building)
location_router.callback_query.register(Building().get_answer, StateLocation.building)

location_router.message.register(Floar().get_answer, StateLocation.floar)
location_router.callback_query.register(Floar().get_answer, StateLocation.floar)

location_router.message.register(Line().get_answer, StateLocation.line)
location_router.callback_query.register(Line().get_answer, StateLocation.line)

location_router.message.register(Address().get_answer, StateLocation.address)
location_router.callback_query.register(Address().get_answer, StateLocation.address)

location_router.callback_query.register(Description().get_answer, StateLocation.description)

location_router.error.register(CustomLogger('logs/error_logs/location_loader.log').loging_hanlder_errors)