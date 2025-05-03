from aiogram import Router
from .location_confirmation.router import location_confirmation_router
from .menu.router import admin_menu_router
from .adding_admin_rights.router import adding_admin_rights_router
from globals import CustomLogger

admin_router = Router()

admin_router.include_router(location_confirmation_router)
admin_router.include_router(admin_menu_router)
admin_router.include_router(adding_admin_rights_router)

admin_router.error.register(CustomLogger('logs/error_logs/admin/admin.log').loging_hanlder_errors) 


