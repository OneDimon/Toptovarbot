from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import BaseHandler

class BallMenu (BaseHandler):
     
    async def menu(self, call: types.CallbackQuery, state: FSMContext):
        text = "что такое баллы? \n"
        text += "баллы - это единицы, которые вы испоьзуются для проведения операций в боте. \n"
        text += "курс баллов: \n"
        text += "1 балл = 200 рублей \n"
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        builder.row(types.InlineKeyboardButton(text="🔙 Вернуться к балансу", callback_data="balance_menu"))
        await self.mssage_answer(call, text, builder)

