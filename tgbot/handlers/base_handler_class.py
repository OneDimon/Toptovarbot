from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from states import states
from abc import ABC, abstractmethod
from globals import event_dispatcher

class BaseHandler:

    @staticmethod
    async def message_answer(event : types.CallbackQuery|types.Message|types.BotCommand, 
                            text : str, reply_markup: types.InlineKeyboardMarkup = None):
        """
        Отправляет ответное сообщение пользователю в зависимости от типа события.
        
        :param event: Событие - сообщение, команда или callback запрос
        :param text: Текст сообщения
        :param reply_markup: Клавиатура для сообщения
        :return: ID отправленного сообщения
        """
        if type(event) == types.CallbackQuery:
            message_id = await event.message.answer(text, reply_markup=reply_markup)
        else:
            message_id = await event.answer(text, reply_markup=reply_markup)
        return message_id.message_id

    @staticmethod
    async def update_data_state(event : types.CallbackQuery|types.Message|types.BotCommand, 
                                state : FSMContext,
                                key : str):
        """
        Обновляет данные состояния в зависимости от события.
        
        :param event: Событие - сообщение, команда или callback запрос
        :param state: Контекст состояния FSM
        :param key: Ключ для обновления данных
        """
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
        """
        Получает объект состояния из модуля по имени состояния и группы.
        
        :param name_state: Имя состояния
        :param name_state_group: Имя группы состояний
        :param module: Модуль, содержащий состояния
        :return: Объект состояния
        """
        name_state_group = ''.join(word.capitalize() for word in name_state_group.split('_'))
        state_group = getattr(module, name_state_group)
        state = getattr(state_group, name_state)
        return state

        

class StepsInterface(ABC):

    @abstractmethod
    async def start_of_step(self ,call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Абстрактный метод для начала шага.
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        """
        pass

    @abstractmethod
    async def get_answer(self ,call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Абстрактный метод для получения ответа пользователя.
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        """
        pass
        

class StepsBase (BaseHandler, StepsInterface):

    def __init__(self, name : str = 'base_step', module : str = 'base'):
        """
        Инициализация базового шага.
        
        :param name: Имя шага
        :param module: Имя модуля
        """
        self.name = name
        self.module = module
        self.key_data_in_state = f'{self.module}_{self.name}'
        self._stop_start_of_step = False
        self._stop_get_answer = False

    async def start_of_step(self, call : types.CallbackQuery, state : FSMContext):
        """
        Запускает шаг: устанавливает состояние, сохраняет шаг, отправляет вопрос.
        
        :param call: Callback запрос
        :param state: Контекст состояния FSM
        """
        await event_dispatcher.dispatch(f'before_start_of_step_{self.module}_{self.name}', call = call, state = state, obj = self)
        stop_func = await self._before_start_of_step(call, state)
        if stop_func == True or self._stop_start_of_step == True:
            return

        new_state = await BaseHandler.get_state_object(self.name, self.module, states)
        await state.set_state(new_state)

        await self._save_step_in_state(call, state)
        message_id = await self._send_a_question(call, state)
        await self._save_message_id(message_id, call, state)
        await self._after_start_of_step(call, state)
        await event_dispatcher.dispatch(f'after_start_of_step_{self.module}_{self.name}', call = call, state = state, obj = self)


    async def get_answer(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Обрабатывает ответ пользователя: проверяет сообщение, сохраняет данные, переходит к следующему шагу.
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        """
        await event_dispatcher.dispatch(f'before_get_answer_{self.module}_{self.name}', call = call, state = state, obj = self)

        stop_func = await self._check_by_message(call, state)
        if stop_func == True or self._stop_get_answer == True:
            await self.message_answer(call, 'Используйте кнопку у последнего сообщения или вернитесь в меню и попробуйте снова.')
            return
        stop_func = await self._before_get_answer(call, state)
        if stop_func == True or self._stop_get_answer == True:
            return
        
        await self._save_answer_data(call, state)
        await self._after_get_answer(call, state)
        await event_dispatcher.dispatch(f'after_get_answer_{self.module}_{self.name}', call = call, state = state, obj = self)
        await self._go_to_next_step(call, state)

    async def _save_step_in_state(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Сохраняет текущий шаг в состоянии FSM.
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        """
        data_state = await state.get_data()

        if f'ar_func_{self.module}' not in data_state or type(data_state[f'ar_func_{self.module}']) != list:
            data_state[f'ar_func_{self.module}'] = []
        if type(call) == types.CallbackQuery and 'back' in call.data:
            return
        
        data_state[f'ar_func_{self.module}'].append(self.start_of_step)
        await state.update_data(data_state)

    async def _send_a_question(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Формирует и отправляет вопрос пользователю с клавиатурой.
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        :return: ID отправленного сообщения
        """
        builder = await self._get_builder_inline_keyboard_for_question(call, state)
        text = await self._get_text_for_question(call, state)
        message_id = await BaseHandler.message_answer(call, text, builder.as_markup())
        return message_id
    
    async def _save_message_id(self, message_id, call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Сохраняет ID сообщения в состоянии FSM.
        
        :param message_id: ID сообщения
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        """
        data_state = await state.get_data()
        data_state[self.key_data_in_state+'_message_id'] = message_id
        await state.update_data(data_state)

    async def _save_answer_data(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Сохраняет данные ответа пользователя в состоянии FSM.
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        """
        await BaseHandler.update_data_state(call, state, f'{self.module}_{self.name}')

    async def _go_to_next_step(self, call : types.CallbackQuery, state : FSMContext):
        """
        Переходит к следующему шагу (реализуется в подклассах).
        
        :param call: Callback запрос
        :param state: Контекст состояния FSM
        """
        pass

    async def _get_builder_inline_keyboard_for_question(self, call : types.CallbackQuery|types.Message, state : FSMContext) -> InlineKeyboardBuilder:
        """
        Формирует клавиатуру для вопроса.
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        :return: Объект InlineKeyboardBuilder с клавиатурой
        """
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Базовая кнопка", callback_data="Базовая кнопка")
        )
        return builder
        
    async def _get_text_for_question(self, call : types.CallbackQuery|types.Message, state : FSMContext) -> str:
        """
        Формирует текст вопроса (реализуется в подклассах).
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        :return: Текст вопроса
        """
        return "Ваш вопрос?"
    
    async def _check_by_message(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Проверяет соответствие сообщения текущему шагу.
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        :return: True, если сообщение не соответствует текущему шагу
        """
        if type(call) == types.Message or type(call) == types.BotCommand:
            return False
        data_state = await state.get_data()
        if data_state[self.key_data_in_state+'_message_id'] != call.message.message_id:
            return True
        return False

    async def _before_start_of_step(self, call : types.CallbackQuery, state : FSMContext):
        """
        Хук, вызываемый перед началом шага (реализуется в подклассах).
        
        :param call: Callback запрос
        :param state: Контекст состояния FSM
        :return: True, если шаг должен быть пропущен
        """
        pass

    async def _after_start_of_step(self, call : types.CallbackQuery, state : FSMContext):
        """
        Хук, вызываемый после начала шага (реализуется в подклассах).
        
        :param call: Callback запрос
        :param state: Контекст состояния FSM
        """
        pass

    async def _before_get_answer(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Хук, вызываемый перед получением ответа (реализуется в подклассах).
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM
        :return: True, если шаг должен быть пропущен
        """
        pass

    async def _after_get_answer(self, call : types.CallbackQuery|types.Message, state : FSMContext):
        """
        Хук, вызываемый после получения ответа (реализуется в подклассах).
        
        :param call: Событие - сообщение или callback запрос
        :param state: Контекст состояния FSM    
        """
        pass