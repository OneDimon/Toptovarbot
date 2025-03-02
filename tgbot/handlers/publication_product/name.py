from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.prouct import ProductDatabase as DB_product
from handlers.base_handler_class import  StepsBase
from config_data.config import *


class Name (StepsBase):
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
                await self.mssage_answer(call, 'Вы уже публиковали свой товар сегодня! Оплатите подписку или приходите завтра.')
                await User.seller(call, state)
                return False
        return True
    
    async def _initialize_publication_product_data_state(self, call: types.CallbackQuery, state: FSMContext):
        from database.categories_product import CategoriesProductDatabase
        data_state = await state.get_data()
        data_state['publication_product_name'] = None
        data_state['publication_product_description'] = None
        data_state['publication_product_price'] = None 
        data_state['publication_product_category_one_level'] = None
        data_state['publication_product_category_two_level'] = None
        data_state['publication_product_category_three_level'] = None
        data_state['publication_product_photo'] = None
        all_categories = await CategoriesProductDatabase.get_all_categories()
        data_state['all_categories'] = all_categories
        await state.update_data(data_state)
        
        
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Напишите название вашего товара'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="❌ Отмена", callback_data="seller"))
        return builder
    
    async def _go_to_next_step(self, message: types.Message, state: FSMContext):
        from . import Description
        await Description().start_of_step(message, state)
   