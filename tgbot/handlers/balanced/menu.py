from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from database.referral_program import ReferralDatabase as DB_referral

class Menu (StepsBase):
    def __init__(self):
        name = 'menu'
        module = 'balance'
        super().__init__(name, module)
    
    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        data_user_ref_program = await DB_referral.get_data_user_ref_program(call.from_user.id)
        balance_user = data_user_ref_program[0][9]
        data_state = await state.get_data()
        data_state['balance_user'] = balance_user
        await state.update_data(data_state)
        return await super()._before_start_of_step(call, state)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        state_data = await state.get_data()
        text = 'ваш баланс: ' + str(state_data['balance_user'])
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        builder.row(types.InlineKeyboardButton(text="💰 Пополнить баланс", callback_data="top_up_balance"))
        builder.row(types.InlineKeyboardButton(text="💸 Вывести деньги", callback_data="out_balance"))
        builder.row(types.InlineKeyboardButton(text="❓ Что такое баллы", callback_data="ball_menu"))
        builder.row(types.InlineKeyboardButton(text="📜 Посмотреть историю транзакций", callback_data="transaction_history"))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from . import TopUp
        if call.data == 'top_up_balance':
            await TopUp().start_of_step(call, state)
            return
        elif call.data == 'out_balance':
            from . import Out
            await Out().start_of_step(call, state)
            return
        elif call.data == 'transaction_history':
            from . import TransactionHistory
            await TransactionHistory().start_of_step(call, state)
            return
        