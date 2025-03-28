from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import  StepsBase

class Description(StepsBase):
    def __init__(self):
        name = 'description'
        module = 'location_loader'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        str_location = 'Вы добавили адресс: ' + data_state['location_loader_name']
        if data_state['location_loader_sector']:
            str_location += ", " + data_state['location_loader_sector']
        if data_state['location_loader_building']:
            str_location += ", " + data_state['location_loader_building']
        if data_state['location_loader_floar']:
            str_location += ", этаж " + data_state['location_loader_floar']
        if data_state['location_loader_line']:
            str_location += ", ряды " + ', '.join(map(str, data_state['location_loader_line']))
        if data_state['location_loader_address']:
            str_location += ", " + data_state['location_loader_address']
        
        str_location += "\n" + "Вы можете изменить локацию в любой момент в личном кабинете"
        return str_location

    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        data_state = await state.get_data()
        if 'id_location_in_db' in data_state and data_state['id_location_in_db']:
            builder.row(types.InlineKeyboardButton(text="✅ Завершить редактирование", callback_data="finish_location_loader_setting"))
        else:
            builder.row(types.InlineKeyboardButton(text="✅ Завершить добавление", callback_data="finish_location_adding"))
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_location_loader"))
        return builder
    
    async def _after_get_answer(self, call: types.CallbackQuery, state: FSMContext):
        if call.data == "finish_location_loader_setting" or call.data == "finish_location_adding":
            data_state = await state.get_data()
            from database.loader.location_loader import LocationLoaderDatabase as DB_location_loader
            await DB_location_loader.add_or_update_location(call.from_user.id,
                                                            data_state['location_loader_name'],
                                                            data_state['location_loader_sector'] ,
                                                            data_state['location_loader_building'], 
                                                            data_state['location_loader_floar'] ,
                                                            data_state['location_loader_line'] ,
                                                            data_state['location_loader_address'])
    
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from handlers.general.user.user_class import User
        await User.loader(call, state)

