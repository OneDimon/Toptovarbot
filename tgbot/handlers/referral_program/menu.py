from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import BaseHandler
from database.referral_program import ReferralDatabase as DB_referral
from config_data.config import *


class Menu (BaseHandler):

    async def referral_menu(self, call : types.CallbackQuery, state : FSMContext):
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
        table_text = await self._get_text_menu(data_user_ref_program)
        builder = await self._get_builder_menu(call.from_user.id)
        await self.mssage_answer(call, table_text, builder.as_markup())

    async def _get_text_menu(self, data_user_ref_program: list) -> str: 
        text_referral_link = data_user_ref_program[0][2]
        table_text = ""
        table_text += "ваша реферальная ссылка: " + text_referral_link + "\n"
        table_text += "ваш реферальный статус: " + (data_user_ref_program[0][7] if data_user_ref_program[0][7] != None else 'Не присвоен') + "\n"
        table_text += "ваш прошлый статус " + (data_user_ref_program[0][8] if data_user_ref_program[0][8] != None else 'Не присвоен') + "\n"
        table_text += "ваш баллы: " + (str(data_user_ref_program[0][9]) if data_user_ref_program[0][9] != None else '0') + "\n"
        table_text += "ваш личный объем в этом месяце: " + (str(data_user_ref_program[0][4]) if data_user_ref_program[0][4] != None else '0') + "\n"
        table_text += "ваш групповый объем в этом месяце: " + (str(data_user_ref_program[0][5]) if data_user_ref_program[0][5] != None else '0') + "\n"
        table_text += "ваш общий объем в этом месяце: " + (str(data_user_ref_program[0][6]) if data_user_ref_program[0][6] != None else '0') + "\n"
        table_text += "ваш потенциальнйы статус по показателям прошедшего месяца: " + (data_user_ref_program[0][10] if data_user_ref_program[0][10] != None else 'Не присвоен') + "\n"
        return table_text
    
    async def _get_builder_menu(self, user_id) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="📝 Оформить подписку", callback_data="subscription_menu"))
        builder.row(types.InlineKeyboardButton(text="📊 Посмотреть таблицу рефералов", url="http://tovartest.ru/referral/?user_id=" + str(user_id) + ""))
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        return builder
        