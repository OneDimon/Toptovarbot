from aiogram import *
from aiogram.fsm.context import FSMContext
from aiogram.filters.command import Command
from states.states import balance as StateBalance
from aiogram.utils.keyboard import InlineKeyboardBuilder
from handlers.balanced.balance_class import Balance_menu, Balance_top_up, Ball_menu

balanced_router = Router()

balanced_router.callback_query.register(Ball_menu().menu, lambda c: c.data == 'ball_menu')

balanced_router.callback_query.register(Balance_menu().start_of_step, lambda c: c.data == 'balance_menu')
balanced_router.callback_query.register(Balance_menu().get_answer, StateBalance.menu)

balanced_router.message.register(Balance_top_up().get_answer, StateBalance.top_up)


