from aiogram import Router
from . import AdminMenu


admin_menu_router = Router()

admin_menu_router.callback_query.register(AdminMenu.admin_menu, lambda c: c.data == 'admin')



