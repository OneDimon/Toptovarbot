from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import Steps_base
from aiogram.types import FSInputFile
from config_data.config import *


class Photo(Steps_base):
    def __init__(self):
        name = 'photo'
        module = 'seller_survey'
        super().__init__(name, module)

    async def _before_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        if "number_of_attempts" in data_state:
            data_state["number_of_attempts"] += 1
        else:
            data_state["number_of_attempts"] = 1
        await state.update_data(data_state)
        from modules.photo_verification_modules import Photo_verification_modules
        photo_id = await Photo_verification_modules.photo_verification(call, data_state["number_of_attempts"])
        if photo_id:
            data_state['seller_survey_photo_id'] = photo_id
            await state.update_data(data_state)
            return
        else:
            return True
    
    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
       data_state = await state.get_data()
       if 'seller_survey_photo_id' not in data_state:
           return
       await call.bot.download(data_state['seller_survey_photo_id'], F"img/{data_state['seller_survey_photo_id']}.jpg")
       data_state[self.key_data_in_state] = F"img/{data_state['seller_survey_photo_id']}.jpg"
       await state.update_data(data_state)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            photo = FSInputFile(data_state[self.key_data_in_state])
            await call.bot.send_photo(call.from_user.id, photo)
            return "вы отправили данную фотографию, " "\n" + "Отпрвьте новую фотграфию или оставьте текущую." 
        else:
            return f"Отправьте фотографию товара"
            
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_seller_survey")
        )
        return builder
            
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from . import Name_product
        await Name_product().start_of_step(call, state)

