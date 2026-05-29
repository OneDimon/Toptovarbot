from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import BaseHandler
from database.general.referral_program import ReferralDatabase as DB_referral
from config_data.config import *
from globals.logger_class import CustomLogger

class Subscription (BaseHandler):

    async def subscription_menu(self, call: types.CallbackQuery, state: FSMContext):
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
        price_subscription = await self._get_price_subscription(data_user_ref_program['status'])
        builder = await self._get_builder_menu(price_subscription)
        text = await self._get_text_menu(data_user_ref_program)
        await self.message_answer(call, text, builder.as_markup())
        
    async def buy_subscription_1_day(self, call: types.CallbackQuery, state: FSMContext):
        await CustomLogger('logs/acton_log/buy_subscription.log').logging_info_user_action(call.from_user, 'начал покупку подписки 1 день')
        price_subscription = 2
        await self._buy_subscription_start(call, state, price_subscription, 'day')

    async def buy_subscription_month(self, call: types.CallbackQuery, state: FSMContext):
        await CustomLogger('logs/acton_log/buy_subscription.log').logging_info_user_action(call.from_user, 'начал покупку подписки месяц')
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
        price_subscription = await self._get_price_subscription(data_user_ref_program['potential_status'])
        await self._buy_subscription_start(call, state, price_subscription, 'month')

    async def _buy_subscription_start(self, call: types.CallbackQuery, state: FSMContext, price_subscription, type_subscription):
        from handlers.general.user.user_class import User
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
        if_subscription = await User._if_subscribshed(call.from_user.id)

        if(if_subscription):
            await self.message_answer(call, "Вы уже оформили подписку!", None)
            await CustomLogger('logs/acton_log/buy_subscription.log').logging_info_user_action(call.from_user, 'пользователь уже оформил подписку')
            
        elif((data_user_ref_program['balance'] if data_user_ref_program['balance'] != None else 0) < price_subscription):
            builder = InlineKeyboardBuilder()
            builder.row(types.InlineKeyboardButton(text="перейти к балансу", callback_data="balance_menu"))
            await self.message_answer(call, "Недостаточно баллов для покупки подписки!", builder.as_markup())
            await CustomLogger('logs/acton_log/buy_subscription.log').logging_info_user_action(call.from_user, 'недостаточно баллов для покупки подписки')

        else:
            await self._buy_subscription_mid(call, state, price_subscription, type_subscription)

    
    async def _get_text_menu(self, data_user_ref_program)->str:
        text = 'ваш баланс: ' + str(data_user_ref_program['balance'] if data_user_ref_program['balance'] != None else 0) + ' баллов\n'
        text += 'подписка даст вам: \n'
        text += '1. неограниченное количество публикаций в канале\n'
        text += '2. неограниченное количество запросов продавцам онлайн \n'
        text += '3. неограниченное количество запросов по категориям\n'
        text += '4. получать доход с рефферальной программы (необходимо купить месячную подписку)\n'
        return text
    
    async def _get_builder_menu(self, price_subscription: int) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⏩ Продолжить пользоваться без подписки", callback_data="main_menu"))
        builder.row(types.InlineKeyboardButton(text=f"💳 Купить месячную подписку за {str(price_subscription)} баллов", callback_data="buy_subscription_month"))
        builder.row(types.InlineKeyboardButton(text="🗓️ Купить подписку на 1 день", callback_data="buy_subscription_1_day"))
        builder.row(types.InlineKeyboardButton(text="💰 Перейти к балансу", callback_data="balance_menu"))
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        return builder
    
    async def _get_price_subscription(self, status):
        if status == 'ASSISTANT' or status == 'director' or status == 'silver_director' or status == None:
            return 50
        elif status == 'gold_director' or status == 'emerald_director' or status == 'diamond_director':
            return 70
        else:
            return 100
        
    async def _buy_subscription_mid(self, call: types.CallbackQuery, state: FSMContext, price_subscription, type_subscription):
        from datetime import datetime
        from dateutil.relativedelta import relativedelta
        from handlers.general.user.user_class import User
        
        try:
            await self._buy_subscription_end(call.from_user.id, price_subscription)
        except:
            await self.message_answer(call, "Произошла ошибка при покупке подписки! Мы уже работаем над исправлением, пожалуйста, повторите попытку позже", None)
            return 
        
        if type_subscription == 'month':
            await User._add_subscribtion(call.from_user.id, datetime.now() + relativedelta(months=1))
        if type_subscription == 'day':
            await User._add_subscribtion(call.from_user.id, datetime.now() + relativedelta(days=1))
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        await self.message_answer(call, "Подписка оформлена!", builder.as_markup())
        await Subscription().subscription_menu(call, state)

    async def _buy_subscription_end(self, user_id, points = 50):
        all_referrers = await DB_referral.get_all_referrers(user_id)
        all_referrers = [list(referrer) for referrer in all_referrers]
        await self._substract_balance(all_referrers[0], points)
        await self._add_LO(all_referrers[0], points)
        await self._add_GO(all_referrers, points)
        await self._add_SOP(all_referrers, points)
        await self._update_referrer_points(all_referrers)
        await DB_referral.update_data_ref_program_after_buy(all_referrers)
        await CustomLogger('logs/acton_log/buy_subscription.log').logging_system_info(f'данные о пользователе обновлены в бд {user_id}')
    
    async def _substract_balance(self, data_user_ref_program, points = 50):
        data_user_ref_program['balance'] -= points
        await CustomLogger('logs/acton_log/buy_subscription.log').logging_system_info(f"у пользователя {data_user_ref_program['user_id']} сняли {points} баллов с баланса")

    async def _add_LO(self, data_user_ref_program, points = 50):
        if data_user_ref_program['points'] == None:
            data_user_ref_program['points'] = points
        else:
            data_user_ref_program['points'] += points
        
        await CustomLogger('logs/acton_log/buy_subscription.log').logging_system_info(f"Пользователю {data_user_ref_program['user_id']} добавили {points} баллов к личному объему")
    
    async def _add_GO(self, all_referrers, points = 50):
        for referrer in all_referrers:
            if referrer['group_points'] == None:
                referrer['group_points'] = points
            else:
                referrer['group_points'] += points
            await CustomLogger('logs/acton_log/buy_subscription.log').logging_system_info(f"Пользователю {referrer['user_id']} добавили {points} баллов к групповому объему")
            if referrer['status'] != 'ASSISTANT':
                return
            
    async def _add_SOP(self, all_referrers, points = 50):
        for referrer in all_referrers:
            if referrer['sop'] == None:
                referrer['sop'] = points
            else:
                referrer['sop'] += points
            await CustomLogger('logs/acton_log/buy_subscription.log').logging_system_info(f"Пользователю {referrer['user_id']} добавили {points} баллов к общему объему")

    async def _update_referrer_points(self, all_referrers):
        for referrer in all_referrers:
            if referrer['points'] == None:
                referrer['points'] = 0
            if referrer['group_points'] == None:
                referrer['group_points'] = 0
            if referrer['sop'] == None:
                referrer['sop'] = 0