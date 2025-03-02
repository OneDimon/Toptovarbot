from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.users import UsersDatabase as DB_users
from database.location import LocationDatabase as DB_location
from states import states
from abc import ABC, abstractmethod

class BaseHandler:

    @staticmethod
    async def mssage_answer(event : types.CallbackQuery|types.Message|types.BotCommand, 
                            text : str, reply_markup: types.InlineKeyboardMarkup = None):
        if type(event) == types.CallbackQuery:
            message_id = await event.message.answer(text, reply_markup=reply_markup)
        else:
            message_id = await event.answer(text, reply_markup=reply_markup)
        return message_id.message_id

    @staticmethod
    async def update_data_state(event : types.CallbackQuery|types.Message|types.BotCommand, 
                                state : FSMContext,
                                key : str):
        
        data_state = await state.get_data()

        if type(event) == types.CallbackQuery:
            event_data = event.data
        else:
            event_data = event.text

        if 'skip' in event_data or 'back' in event_data:
            data_state[key] = None
        
        elif 'current' in event_data:
            pass
        else:
            data_state[key] = event_data
        
        await state.update_data(data_state)

    @staticmethod
    async def get_state_object(name_state: str, name_state_group: str, module: __module__): 
        name_state_group = ''.join(word.capitalize() for word in name_state_group.split('_'))
        state_group = getattr(module, name_state_group)
        state = getattr(state_group, name_state)
        return state

        

class StepsInterface(ABC):

    @abstractmethod
    async def start_of_step(self ,call : types.CallbackQuery|types.Message, state : FSMContext):
        pass

    @abstractmethod
    async def get_answer(self ,call : types.CallbackQuery|types.Message, state : FSMContext):
        pass
        

class StepsBase (BaseHandler, StepsInterface):

    def __init__(self, name : str = 'base_step', module : str = 'base'):
        self.name = name
        self.module = module
        self.key_data_in_state = f'{self.module}_{self.name}'

    async def start_of_step(self, call : types.CallbackQuery, state : FSMContext):
        stop_func = await self._before_start_of_step(call, state)
        if stop_func == True:
            return

        new_state = await BaseHandler.get_state_object(self.name, self.module, states)
        await state.set_state(new_state)

        await self._save_step_in_state(call, state)
        message_id = await self._send_a_question(call, state)
        await self._save_message_id(message_id, call, state)
        await self._after_start_of_step(call, state)

    async def get_answer(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        stop_func = await self._check_by_message(call, state)
        if stop_func == True:
            await self.mssage_answer(call, 'Используйте кнопку у последнего сообщения или вернитесь в меню и попробуйте снова.')
            return
        stop_func = await self._before_get_answer(call, state)
        if stop_func == True:
            return
        
        await self._save_answer_data(call, state)
        await self._after_get_answer(call, state)
        await self._go_to_next_step(call, state)

    async def _save_step_in_state(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        data_state = await state.get_data()

        if f'ar_func_{self.module}' not in data_state or type(data_state[f'ar_func_{self.module}']) != list:
            data_state[f'ar_func_{self.module}'] = []
        if type(call) == types.CallbackQuery and 'back' in call.data:
            return
        
        data_state[f'ar_func_{self.module}'].append(self.start_of_step)
        await state.update_data(data_state)

    async def _send_a_question(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        builder = await self._get_builder_inline_keyboard_for_question(call, state)
        text = await self._get_text_for_question(call, state)
        message_id = await BaseHandler.mssage_answer(call, text, builder.as_markup())
        return message_id
    
    async def _save_message_id(self, message_id, call : types.CallbackQuery|types.Message, state : FSMContext):
        data_state = await state.get_data()
        data_state[self.key_data_in_state+'_message_id'] = message_id
        await state.update_data(data_state)

    async def _save_answer_data(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        await BaseHandler.update_data_state(call, state, f'{self.module}_{self.name}')

    async def _go_to_next_step(self, call : types.CallbackQuery, state : FSMContext):
        pass

    async def _get_builder_inline_keyboard_for_question(self, call : types.CallbackQuery|types.Message, state : FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Базовая кнопка", callback_data="Базовая кнопка")
        )
        return builder
        
    async def _get_text_for_question(self, call : types.CallbackQuery|types.Message, state : FSMContext) -> str:
        return "Ваш вопрос?"
    
    async def _check_by_message(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        if type(call) == types.Message or type(call) == types.BotCommand:
            return False
        data_state = await state.get_data()
        if data_state[self.key_data_in_state+'_message_id'] != call.message.message_id:
            return True
        return False

    async def _before_start_of_step(self, call : types.CallbackQuery, state : FSMContext):
        pass

    async def _after_start_of_step(self, call : types.CallbackQuery, state : FSMContext):
        pass

    async def _before_get_answer(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        pass

    async def _after_get_answer(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        pass