from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.prouct import ProductDatabase as DB_product
from handlers.base_handler_class import  StepsBase
from aiogram.types import FSInputFile
from config_data.config import *

class Photo (StepsBase):
    def __init__(self):
        name = 'photo'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Прикрепите фото'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_publication_product"))
        return builder
    
    async def _before_get_answer(self, call: types.Message, state: FSMContext):
        data_state = await state.get_data()
        if "number_of_attempts" in data_state:
            data_state["number_of_attempts"] += 1
        else:
            data_state["number_of_attempts"] = 1
        await state.update_data(data_state)
        from modules.photo_verification_modules import PhotoVerificationModules
        photo_id = await PhotoVerificationModules.photo_verification(call, data_state["number_of_attempts"])
        if photo_id:
            data_state['location_photo_id'] = photo_id
            await state.update_data(data_state)
            return
        else:
            return True
        
    async def _save_answer_data(self, call: types.Message, state: FSMContext):
       data_state = await state.get_data()
       if 'location_photo_id' not in data_state:
           return
       await call.bot.download(data_state['location_photo_id'], F"img/{data_state['location_photo_id']}.jpg")
       data_state[self.key_data_in_state] = F"img/{data_state['location_photo_id']}.jpg"
       await state.update_data(data_state)

    async def _after_get_answer(self, call: types.Message, state: FSMContext):
        await self.__response_finish(call, state)
        await self.__save_product(call, state)
        await self.__publish_product_for_chanel(call, state)

    async def __response_finish(self, call: types.Message, state: FSMContext):
        text = await self.__get_respronse_finish_text() 
        keyboard = await self.__get_inline_keyboard_for_finish(call, state)
        await self.mssage_answer(call, text, keyboard)

    async def __get_respronse_finish_text(self):
        return "Ваше объявление опубликовано"
    
    async def __get_inline_keyboard_for_finish(self, call: types.Message, state: FSMContext):
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="❌ на сегодня все", callback_data="main_menu"))
        builder.row(types.InlineKeyboardButton(text="📝 опубликовать еще", callback_data="publication_product"))
        return builder.as_markup()

    async def __save_product(self, call: types.Message, state: FSMContext):
        data_state = await state.get_data()
        await DB_product.publication_product(call.from_user.id,
                                            data_state['publication_product_name'],
                                            data_state['publication_product_description'],
                                            data_state['publication_product_price'], 
                                            data_state['publication_product_category_one_level'],
                                            data_state['publication_product_category_two_level'],
                                            data_state['publication_product_category_three_level'],
                                            data_state['publication_product_photo'],)
        
    async def __publish_product_for_chanel(self, call: types.Message, state: FSMContext):
        data_state = await state.get_data()
        text = f"{data_state['publication_product_name']}\n {data_state['publication_product_description']} \n цена:  {data_state['publication_product_price']}"
        photo = FSInputFile(data_state['publication_product_photo'])
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🤖 В бота", url=LINK_BOT))
        await call.bot.send_photo(CHANNEL, photo, caption=text , reply_markup=builder.as_markup())
              
