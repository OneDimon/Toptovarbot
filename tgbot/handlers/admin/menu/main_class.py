from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from handlers.base_handler_class import BaseHandler
class AdminMenu(BaseHandler):
    @staticmethod
    async def admin_menu(call: types.CallbackQuery):
        text = await AdminMenu.get_text_admin_menu()
        markup = await AdminMenu.get_markup_admin_menu()
        await AdminMenu.message_answer(call, text, markup)

    @staticmethod
    async def get_markup_admin_menu():
        markup = InlineKeyboardBuilder()
        markup.row(types.InlineKeyboardButton(text="Подтверждение локаций", callback_data="admin_location_confirmations"))
        return markup.as_markup()

    @staticmethod
    async def get_text_admin_menu():
        return "Меню администратора"


