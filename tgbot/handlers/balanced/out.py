from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from database.referral_program import ReferralDatabase as DB_referral

class Out (StepsBase):
    def __init__(self):
        name = 'out'
        module = 'balance'
        super().__init__(name, module)

    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        step_data = await state.get_data()
        if step_data['balance_user'] == None or step_data['balance_user'] == 0:
            await self.mssage_answer(call, 'ваш баланс пуст')
            return True

        from globals import CustomLogger
        await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, 'начал вывод средств с баланса')
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        return 'введите сумму вывода, сумма вывода не должна превышать ваш баланс'
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        return builder
    
    async def _before_get_answer(self, call, state):
        from globals import CustomLogger
        import json
        step_data = await state.get_data()
        if type(call) != types.Message or not call.text.isdigit():
            await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, f'вывод средств не прошел успешно, пользователь ввел {json.dumps(call, ensure_ascii=False, indent=4)}')
            await self.mssage_answer(call, 'введите целое число например 1000')
            return True
            
        if step_data['balance_user'] < int(call.text):
            await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, f'вывод средств не прошел успешно, пользователь ввел {call.text}, что больше его баланса {step_data["balance_user"]}')
            await self.mssage_answer(call, 'вывод не прошел, на вашем балансе недостаточно средств')
            return True
            
    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
       
        if type(call) == types.Message and call.text.isdigit():
            await self._update_balance_user(call, state)
            await self._update_balance_system(call, state)

    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from . import Menu
        await Menu().start_of_step(call, state)
        return
    
    async def _update_balance_user(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from database.history_transaction import HistoryTransactionDatabase
        from globals import CustomLogger
        step_data = await state.get_data()
        step_data['balance_user'] -= int(call.text)
        await state.update_data(step_data)
        await DB_referral.update_balance(call.from_user.id, step_data['balance_user'])
        await HistoryTransactionDatabase.set_history_transaction(call.from_user.id, -int(call.text), 'вывод средств с баланса')
        await self.mssage_answer(call, 'вывод средств прошел успешно')
        await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, f'вывод средств с  баланса на сумму {call.text} прошел успешно')

    async def _update_balance_system(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        from globals import CustomLogger
        from database.system_info import SystemInfoDatabase
        system_balance = await SystemInfoDatabase.get_system_info('system_balance')
        system_balance = int(system_balance[0][0])
        system_balance -= int(call.text)
        await SystemInfoDatabase.set_system_info('system_balance', system_balance)
        await CustomLogger('logs/acton_log/tup_up_balance.log').logging_info_user_action(call.from_user, f'вывод средств с баланса системы на сумму {call.text} прошел успешно')

            
        
