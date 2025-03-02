from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from database.referral_program import ReferralDatabase as DB_referral

class TopUp (StepsBase):
    def __init__(self):
        name = 'top_up'
        module = 'balance'
        super().__init__(name, module)

    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        from globals import CustomLogger
        await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, 'начал пополнение баланса')
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        return 'введите сумму пополнения'
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        return builder
    
    async def _before_get_answer(self, call, state):
        from globals import CustomLogger
        import json
        if type(call) == types.Message:
            if not call.text.isdigit():
                await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, f'пополнение баланса прошло неуспешно, пользователь ввел {json.dumps(call, ensure_ascii=False, indent=4)}')
                await self.mssage_answer(call, 'введите целое число например 1000')
                return True
    
    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if type(call) == types.Message and call.text.isdigit():
            await self._update_balance_user(call, state)
            await self._update_balance_system(call, state)

    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from . import Menu
        await Menu().start_of_step(call, state)

    
    async def _update_balance_user(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from database.history_transaction import HistoryTransactionDatabase
        step_data = await state.get_data()
        if step_data['balance_user'] == None:
            step_data['balance_user'] = 0
        step_data['balance_user'] += int(call.text)
        await state.update_data(step_data)
        await DB_referral.update_balance(call.from_user.id, step_data['balance_user'])
        await HistoryTransactionDatabase.set_history_transaction(call.from_user.id, int(call.text), 'пополнение баланса')
        await self.mssage_answer(call, 'пополнение прошло успешно')
        from globals import CustomLogger
        await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, f'пополнение баланса на сумму {call.text} прошло успешно')

    async def _update_balance_system(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from globals import CustomLogger
        from database.system_info import SystemInfoDatabase
        system_balance = await SystemInfoDatabase.get_system_info('system_balance')
        if system_balance == None:
            system_balance = 0
        system_balance += call.text
        await SystemInfoDatabase.set_system_info('system_balance', system_balance)
        await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, f'пополнение баланса системы на сумму {call.text} прошло успешно')



        

