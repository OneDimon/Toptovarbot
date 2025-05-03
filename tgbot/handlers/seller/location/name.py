from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import  StepsBase

class Name(StepsBase):
    def __init__(self, id_location_in_db: int = None):
        self.id_location_in_db = id_location_in_db
        name = 'name'
        module = 'location'
        super().__init__(name, module)

    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):      
        state_data = await state.get_data()
        if 'init_location' in state_data and state_data['init_location'] == True:
            return
        else:
            state_data['location_name'] = ''
            state_data['location_sector'] = ''
            state_data['location_building'] = ''
            state_data['location_floar'] = ''
            state_data['location_line'] = ''
            state_data['location_place'] = ''
            state_data['location_address'] = ''
            state_data['location_photo'] = ''
            state_data['init_location'] = True
            state_data['number_of_attempts'] = 0
            if self.id_location_in_db:
                state_data['id_location_in_db'] = self.id_location_in_db
            await state.update_data(state_data)

    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return 'Ваша торговая точка ' + data_state[self.key_data_in_state] + ', выберите один из вариантов или оставьте текущий'
        else:
            return 'Где находится ваша торговая точка?'
        
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🛒 р-к Садовод", callback_data="р-к Садовод"))
        builder.row(types.InlineKeyboardButton(text="🏙️ ТЯК Москва", callback_data="ТЯК Москва"))
        builder.row(types.InlineKeyboardButton(text="🚪 р-к Южные Ворота", callback_data="р-к Южные ворота"))
        builder.row(types.InlineKeyboardButton(text="✍️ Свой вариант", callback_data="Свой вариант"))
        builder.row(types.InlineKeyboardButton(text="🇨🇳 Поставщик из Китая", callback_data="Поставщики из Китая"))
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(text="💾 Оставить текущее", callback_data="current"))
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="main_menu") )
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        call_data = call.data
        if call_data == "current":
            data_state = await state.get_data()
            call_data = data_state[self.key_data_in_state]
        match call_data:
            case "р-к Садовод" :
                from . import Sector
                await Sector().start_of_step(call, state)
            case "ТЯК Москва" :
                from . import Building
                await Building().start_of_step(call, state)
            case "р-к Южные ворота" :
                from . import Building
                await Building().start_of_step(call, state)
            case "Свой вариант" :
                from . import Address
                await Address().start_of_step(call, state)
            case "Поставщие из китая":
                from . import Address
                await Address().start_of_step(call, state)
        
