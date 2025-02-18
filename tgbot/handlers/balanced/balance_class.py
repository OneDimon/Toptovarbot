from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from states.states import balance as StateBalance
from handlers.base_handler_class import Base_hanler, Steps_base
from aiogram.types import FSInputFile
from database.referral_program import Referral_database as DB_referral


class Balance_menu (Steps_base):
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
        builder.row(types.InlineKeyboardButton(text="❓ Что такое баллы", callback_data="ball_menu"))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if call.data == 'top_up_balance':
            await Balance_top_up().start_of_step(call, state)
            return

class Balance_top_up (Steps_base):
    def __init__(self):
        name = 'top_up'
        module = 'balance'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        return 'введите сумму пополнения'
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        return builder
    
    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        step_data = await state.get_data()
       
        if type(call) == types.Message and call.text.isdigit():
            if step_data['balance_user'] == None:
                step_data['balance_user'] = 0
            step_data['balance_user'] += int(call.text)
            await state.update_data(step_data)
            await DB_referral.top_up_balance(call.from_user.id, step_data['balance_user'])

    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if type(call) == types.Message:
            if call.text.isdigit():
                await self.mssage_answer(call, 'пополнение прошло успешно')
                await Balance_menu().start_of_step(call, state)
                return
        await self.mssage_answer(call, 'введите число')
        

class Ball_menu (Base_hanler):
     
    async def menu(self, call: types.CallbackQuery, state: FSMContext):
        text = "что такое баллы? \n"
        text += "баллы - это единицы, которые вы испоьзуются для проведения операций в боте. \n"
        text += "курс баллов: \n"
        text += "1 балл = 200 рублей \n"
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        builder.row(types.InlineKeyboardButton(text="🔙 Вернуться к балансу", callback_data="balance_menu"))
        await self.mssage_answer(call, text, builder)

