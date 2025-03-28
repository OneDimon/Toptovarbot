from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.seller.location_seller import LocationSellerDatabase as DB_location
from handlers.base_handler_class import StepsBase
from modules.photo_verification_modules import PhotoVerificationModules
from aiogram.types import FSInputFile

class Photo(StepsBase):
    def __init__(self):
        name = 'photo'
        module = 'location'
        super().__init__(name, module)

    async def _before_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        if type(call) == types.CallbackQuery:
            return
        
        photo_id = await PhotoVerificationModules.photo_verification(call, data_state['number_of_attempts'])

        if photo_id:
            data_state['location_photo_id'] = photo_id
            await state.update_data(data_state)
            return
        else:
            return True
    
    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
       data_state = await state.get_data()
       if 'location_photo_id' not in data_state:
           return
       await call.bot.download(data_state['location_photo_id'], F"img/{data_state['location_photo_id']}.jpg")
       data_state[self.key_data_in_state] = F"img/{data_state['location_photo_id']}.jpg"
       await state.update_data(data_state)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            photo = FSInputFile(data_state[self.key_data_in_state])
            await call.bot.send_photo(call.from_user.id, photo)
            return "вы отправили данную фотографию, " "\n" + "Отпрвьте новую фотграфию или оставьте текущую." 
        else:
            return f"Отправьте фотографию вашего торгового места \n ОБЯЗАТЕЛЬНО, чтобы четко было видно ряд и место над ТТ"
            
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⏭️ Пропустить", callback_data="skip"))
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(text="💾 Оставить текущее", callback_data="current"))
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_location"))
        return builder

    async def _after_get_answer(self, call: types.CallbackQuery, state: FSMContext):
        data_state = await state.get_data()
        if 'id_location_in_db' in data_state and data_state['id_location_in_db']:
            await DB_location.update_location(data_state['id_location_in_db'],
                                              data_state['location_name'],
                                              data_state['location_sector'],
                                              data_state['location_building'],
                                              data_state['location_floar'],
                                              data_state['location_line'],
                                              data_state['location_place'],
                                              data_state['location_address'],
                                              data_state['location_photo'])
        else:
            await DB_location.add_location(call.from_user.id, 
                                           data_state['location_name'],
                                           data_state['location_sector'],
                                           data_state['location_building'],
                                           data_state['location_floar'],
                                           data_state['location_line'],
                                           data_state['location_place'],
                                           data_state['location_address'],
                                           data_state['location_photo'])
            
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from . import Description
        await Description().start_of_step(call, state)

