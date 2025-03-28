from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from database.general.referral_program import ReferralDatabase as DB_referral

class TransactionHistory (StepsBase):
    def __init__(self):
        name = 'transaction_history'
        module = 'balance'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        from database.general.history_transaction import HistoryTransactionDatabase
        history_transactions = await HistoryTransactionDatabase.get_history_transaction_from_user(call.from_user.id)
        text = '📜 История транзакций'
        for history_transaction in history_transactions:
            text += '\n' + str(history_transaction['amount'])
            text += '\n' + str(history_transaction['type'])
            text += '\n' + '_____________________________'
        return text

    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="balance_menu"))
        return builder