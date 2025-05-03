from aiogram import *
from states.states import Balance as StateBalance
from globals.logger_class import CustomLogger
from . import *
from aiogram.filters import StateFilter

balanced_router = Router()

balanced_router.callback_query.register(BallMenu().menu, lambda c: c.data == 'ball_menu')

balanced_router.callback_query.register(Menu().start_of_step, lambda c: c.data == 'balance_menu')
balanced_router.callback_query.register(Menu().get_answer, StateBalance.menu)

balanced_router.message.register(TopUp().get_answer, StateBalance.top_up)
balanced_router.message.register(Out().get_answer, StateBalance.out)

balanced_router.error.register(CustomLogger('logs/error_logs/general/balanced.log').loging_hanlder_errors, StateFilter(StateBalance))


