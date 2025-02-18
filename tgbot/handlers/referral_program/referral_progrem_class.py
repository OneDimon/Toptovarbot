from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from states.states import publication_product as StatePublication_product
from handlers.base_handler_class import Base_hanler, Steps_base
from database.referral_program import Referral_database as DB_referral
from modules.photo_verification_modules import Photo_verification_modules
from aiogram.types import FSInputFile
from config_data.config import *
import numpy as np

class Referral_program (Base_hanler):

    async def referral_menu(self, call : types.CallbackQuery, state : FSMContext):
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
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
        link = 'http://tovartest.ru/referral/?user_id=' + str (call.from_user.id)
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="📝 Оформить подписку", callback_data="subscription_menu"))
        builder.row(types.InlineKeyboardButton(text="📊 Посмотреть таблицу рефералов", url=link))
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        await self.mssage_answer(call, table_text, builder.as_markup())

    async def generate_referral_table(referrals):
        table_text = "```\n| Уровень | ID Пользователя | ID Реферера | Баллы |\n"
        table_text += "|---------|-----------------|-------------|-------|\n"

        for referral in referrals:
            level = referral['LEVEL']
            user_id = referral['USER_ID']
            referrer_id = referral['REFERRER_ID']
            points = referral['POINTS']
            table_text += f"| {level:^7} | {user_id:^15} | {referrer_id:^11} | {points:^5} |\n"

        table_text += "```"  

        return table_text    
        
    async def generate_referral_text(self, referrals):
    # Создаем словарь, где ключ - уровень, а значения - списки рефералов на этом уровне
        referrals_by_level = {}
        for referral in referrals:
            level = referral[9]
            if level not in referrals_by_level:
                referrals_by_level[level] = []
            referrals_by_level[level].append(referral)

        table_text = "```\n| Уровень | ID Пользователя | ID Реферера | Баллы |\n"
        table_text += "|---------|-----------------|-------------|-------|\n"

        for level in range(1, 9):
            if level in referrals_by_level:
                for referral in referrals_by_level[level]:
                    table_text += f"| {level:^7} | {referral[1]:^15} | {referral[2]:^11} | {0:^5} |\n "
        
        return table_text
    
    async def buy_subscription(self, user_id, points = 50):
        all_referrers = await DB_referral.get_all_referrers(user_id)
        all_referrers = [list(referrer) for referrer in all_referrers]

        await self.substract_balance(all_referrers[0], points)
        await self.add_LO(all_referrers[0], points)
        await self.add_GO(all_referrers, points)
        await self.add_SOP(all_referrers, points)
        await self.update_referrer_points(all_referrers)
        await DB_referral.update_data_ref_program_after_buy(all_referrers)

    async def substract_balance(self, data_user_ref_program, points = 50):
        if data_user_ref_program[9] == None:
            data_user_ref_program[9] = -points
        else:
            data_user_ref_program[9] -= points
    async def add_LO(self, data_user_ref_program, points = 50):
        if data_user_ref_program[4] == None:
            data_user_ref_program[4] = points
        else:
            data_user_ref_program[4] += points
    
    async def add_GO(self, all_referrers, points = 50):
        for referrer in all_referrers:
            if referrer[5] == None:
                referrer[5] = points
            else:
                referrer[5] += points
            if referrer[7] != 'ASSISTANT':
                return
            
    async def add_SOP(self, all_referrers, points = 50):
        for referrer in all_referrers:
            if referrer[6] == None:
                referrer[6] = points
            else:
                referrer[6] += points

    async def update_referrer_points(self, all_referrers):
        for referrer in all_referrers:
            if referrer[4] == None:
                referrer[4] = 0
            if referrer[5] == None:
                referrer[5] = 0
            if referrer[6] == None:
                referrer[6] = 0
        

class Subscription (Base_hanler):

    async def subscription_menu(self, call: types.CallbackQuery, state: FSMContext):
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
        price_subscription = await self.get_price_subscription(data_user_ref_program[0][7])
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⏩ Продолжить пользоваться без подписки", callback_data="main_menu"))
        builder.row(types.InlineKeyboardButton(text=f"💳 Купить месячную подписку за {price_subscription} баллов", callback_data="buy_subscription_month"))
        builder.row(types.InlineKeyboardButton(text="🗓️ Купить подписку на 1 день", callback_data="buy_subscription_1_day"))
        builder.row(types.InlineKeyboardButton(text="💰 Перейти к пополнению баланса", callback_data="balance_menu"))
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        text = 'ваш баланс: ' + str(data_user_ref_program[0][9] if data_user_ref_program[0][9] != None else 0) + ' баллов\n'
        text += 'подписка даст вам: \n'
        text += '1. неограниченное количество публикаций в канале\n'
        text += '2. неограниченное количество запросов продавцам онлайн \n'
        text += '3. неограниченное количество запросов по категориям\n'
        text += '4. получать доход с рефферальной программы (необходимо купить месячную подписку)\n'
        await self.mssage_answer(call, text, builder.as_markup())

    async def buy_subscription_1_day(self, call: types.CallbackQuery, state: FSMContext):
        price_subscription = 2
        await self.buy_subscription_public(call, state, price_subscription, 'day')

    async def buy_subscription_month(self, call: types.CallbackQuery, state: FSMContext):
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
        price_subscription = await self.get_price_subscription(data_user_ref_program[0][10])
        await self.buy_subscription_public(call, state, price_subscription, 'month')

    async def buy_subscription_public(self, call: types.CallbackQuery, state: FSMContext, price_subscription, type_subscription):
        from handlers.user.user_class import User
        from datetime import datetime
        from dateutil.relativedelta import relativedelta
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
        user = await User._search_user(call.from_user.id)
        if_subscription = await User._if_subscribshed(call.from_user.id)

        if(if_subscription):
            await self.mssage_answer(call, "Вы уже оформили подписку!", None)

        elif((data_user_ref_program[0][9] if data_user_ref_program[0][9] != None else 0) < price_subscription):
            builder = InlineKeyboardBuilder()
            builder.row(types.InlineKeyboardButton(text="перейти к пополнению баланса", callback_data="balance_menu"))
            await self.mssage_answer(call, "Недостаточно баллов для покупки подписки!", builder.as_markup())

        else:
            await Referral_program().buy_subscription(call.from_user.id, price_subscription)
            if type_subscription == 'month':
                await User._add_subscribtion(call.from_user.id, datetime.now() + relativedelta(months=1))
            if type_subscription == 'day':
                await User._add_subscribtion(call.from_user.id, datetime.now() + relativedelta(days=1))
            builder = InlineKeyboardBuilder()
            builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
            await self.mssage_answer(call, "Подписка оформлена!", builder.as_markup())
            await Subscription().subscription_menu(call, state)
    
    async def get_price_subscription(self, status):
        if status == 'ASSISTANT' or status == 'director' or status == 'silver_director' or status == None:
            return 50
        elif status == 'gold_director' or status == 'emerald_director' or status == 'diamond_director':
            return 70
        else:
            return 100