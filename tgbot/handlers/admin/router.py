from aiogram import Router
from .location_confirmation import location_confirmation_router
from globals import CustomLogger

admin_router = Router()

admin_router.include_router(location_confirmation_router)

admin_router.error.register(CustomLogger('logs/error_logs/admin.log').loging_hanlder_errors) 


