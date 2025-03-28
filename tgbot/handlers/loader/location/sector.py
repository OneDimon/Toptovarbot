from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase

class Sector(StepsBase):
    def __init__(self):
        name = 'sector'
        module = 'location_loader'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "Вы выбрали р-к " + data_state[self.key_data_in_state] + "\n" + "Укажите в каком секторе вы работаете." + "\n" + "Или оставьте текущий" 
        else:
            return "Вы выбрали р-к Садовод\n" + "Укажите в каком секторе вы работаете."
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 Крытый вещевой рынок", callback_data="Крытый вещевой рынок"))
        builder.row(types.InlineKeyboardButton(text="🏢 Торговый комплекс", callback_data="Торговый комплекс"))
        builder.row(types.InlineKeyboardButton(text="🏗️ Строение", callback_data="Строение"))
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(text="💾 Оставить текущее", callback_data="current"))
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_location_loader"))
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        call_data = call.data
        if call_data == "current":
            data_state = await state.get_data()
            call_data = data_state[self.key_data_in_state]
        match call_data:
            case "Крытый вещевой рынок" :
                from . import Line
                await Line().start_of_step(call, state)
            case "Торговый комплекс" :
                from . import Building
                await Building().start_of_step(call, state)
            case "Строение" :
                from . import Building
                await Building().start_of_step(call, state)
        