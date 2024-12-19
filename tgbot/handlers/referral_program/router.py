from aiogram import *
from aiogram.fsm.context import FSMContext
from aiogram.filters.command import Command
from states.states import publication_product as StatePublication_product
from aiogram.utils.keyboard import InlineKeyboardBuilder
from handlers.referral_program import referral_progrem_class


referral_program_router = Router()


referral_program_router.callback_query.register(referral_progrem_class.Referral_program().referral_menu, lambda c: c.data == 'referral_program')
referral_program_router.callback_query.register(referral_progrem_class.Subscription().subscription_menu, lambda c: c.data == 'subscription_menu')
referral_program_router.callback_query.register(referral_progrem_class.Subscription().buy_subscription_1_day, lambda c: c.data == 'buy_subscription_1_day')
referral_program_router.callback_query.register(referral_progrem_class.Subscription().buy_subscription_month, lambda c: c.data == 'buy_subscription_month')


