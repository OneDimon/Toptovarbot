from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.prouct import Product_database as DB_product
from states.states import publication_product as StatePublication_product
from handlers.base_handler_class import Base_hanler, Steps_base
from modules.photo_verification_modules import Photo_verification_modules
from aiogram.types import FSInputFile
from config_data.config import *
import numpy as np

class Publication_product (Base_hanler):

    @staticmethod
    async def back_publication_product(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_publication_product'].pop()
        func = data_state['ar_func_publication_product'][-1]
        await func(call, state)
        
class Publication_product_name (Steps_base):
    def __init__(self):
        name = 'name'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        if not await self._if_option_publish(call, state):
            return True
        await self._initialize_publication_product_data_state(call, state)

            
    async def _if_option_publish(self, call: types.CallbackQuery, state: FSMContext) -> bool:
        from handlers.user.user_class import User
        if not await User._if_subscribshed(call.from_user.id):
            product = await DB_product.get_product_by_user_and_date(call.from_user.id, call.message.date)
            if product:
                await self.mssage_answer(call, 'Вы уже публиковали свое объявнление сегодня! Оплатите подписку или приходите завтра.')
                await User.seller(call, state)
                return False
        return True
    
    async def _initialize_publication_product_data_state(self, call: types.CallbackQuery, state: FSMContext):
        from database.categories_product import Categories_product_database
        data_state = await state.get_data()
        data_state['publication_product_name'] = None
        data_state['publication_product_description'] = None
        data_state['publication_product_price'] = None 
        data_state['publication_product_category_one_level'] = None
        data_state['publication_product_category_two_level'] = None
        data_state['publication_product_category_three_level'] = None
        data_state['publication_product_photo'] = None
        all_categories = await Categories_product_database.get_all_categories()
        data_state['all_categories'] = all_categories
        await state.update_data(data_state)
        
        
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Напишите название вашего товара'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Отмена", callback_data="seller"))
        return builder
    
    async def _go_to_next_step(self, message: types.Message, state: FSMContext):
        await Publication_product_description().start_of_step(message, state)
            

class Publication_product_description (Steps_base):
    def __init__(self):
        name = 'description'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Напишите описание вашего товара'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_publication_product"))
        return builder
    
    async def _go_to_next_step(self, message: types.Message, state: FSMContext):
        await Publication_product_category_one_level().start_of_step(message, state)

class Publication_product_category_one_level (Steps_base):
    def __init__(self):
        name = 'category_one_level'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Выберите категорию'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_publication_product"))
        unique_categories = list(set(subarray[1] for subarray in data_state['all_categories']))
        for category in unique_categories:
            if 64 > len(category.encode('utf-8')):
                builder.row(types.InlineKeyboardButton(text=category, callback_data=category))
        return builder
    
    async def _go_to_next_step(self, message: types.Message, state: FSMContext):
        await Publication_product_category_two_level().start_of_step(message, state)

class Publication_product_category_two_level (Steps_base):
    def __init__(self):
        name = 'category_two_level'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Выберите категорию'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_publication_product"))
        unique_categories = list(set(subarray[2] for subarray in data_state['all_categories'] if subarray[1] == data_state['publication_product_category_one_level']))
        for category in unique_categories:
            if 64 > len(category.encode('utf-8')):
                builder.row(types.InlineKeyboardButton(text=category, callback_data=category))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        if call.data == 'skip_category_two_level':
            await Publication_product_price().start_of_step(call, state)
            return
        await Publication_product_category_three_level().start_of_step(call, state)

class Publication_product_category_three_level (Steps_base):
    def __init__(self):
        name = 'category_three_level'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Выберите категорию'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        data_state = await state.get_data()
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_publication_product"))
        unique_categories = list(set(subarray[3] for subarray in data_state['all_categories'] if subarray[2] == data_state['publication_product_category_two_level']))
        for category in unique_categories:
            if 64 > len(category.encode('utf-8')):
                builder.row(types.InlineKeyboardButton(text=category, callback_data=category))
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        await Publication_product_price().start_of_step(call, state)

class Publication_product_price (Steps_base):
    def __init__(self):
        name = 'price'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Укажите цену'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_publication_product"))
        return builder
    
    async def _go_to_next_step(self, message: types.Message, state: FSMContext):
        await Publication_product_photo().start_of_step(message, state)

class Publication_product_photo (Steps_base):
    def __init__(self):
        name = 'photo'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Прикрепите фото'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="back_publication_product"))
        return builder
    
    async def _before_get_answer(self, call: types.Message, state: FSMContext):
        data_state = await state.get_data()
        if "number_of_attempts" in data_state:
            data_state["number_of_attempts"] += 1
        else:
            data_state["number_of_attempts"] = 1
        await state.update_data(data_state)
        from modules.photo_verification_modules import Photo_verification_modules
        photo_id = await Photo_verification_modules.photo_verification(call, data_state["number_of_attempts"])
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
        text = "Ваше объявление опубликовано"
        await self.mssage_answer(call, text)

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
        builder.row(types.InlineKeyboardButton(text="В бота", url=LINK_BOT))
        await call.bot.send_photo(CHANNEL, photo, caption=text , reply_markup=builder.as_markup())
              



        

        