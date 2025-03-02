from aiogram import *
from globals import CustomLogger
from . import *


referral_program_router = Router()


referral_program_router.callback_query.register(Menu().referral_menu, lambda c: c.data == 'referral_program')
referral_program_router.callback_query.register(Subscription().subscription_menu, lambda c: c.data == 'subscription_menu')
referral_program_router.callback_query.register(Subscription().buy_subscription_1_day, lambda c: c.data == 'buy_subscription_1_day')
referral_program_router.callback_query.register(Subscription().buy_subscription_month, lambda c: c.data == 'buy_subscription_month')
referral_program_router.error.register(CustomLogger('logs/error_logs/referral_program.log').loging_hanlder_errors)

