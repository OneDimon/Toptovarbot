from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from config_data.config import *

class Comment (StepsBase):
    def __init__(self):
        name = 'comment'
        module = 'confirm_location_seller'
        super().__init__(name, module)

    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        return 'Введите ваш комментарий, при желании'
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text='пропустить', callback_data='skip'))
        builder.row(types.InlineKeyboardButton(text='назад', callback_data='back_confirm_location_seller'))
        return builder
    
    async def _after_get_answer(self, call, state):
        from database.loader.confirm_location_seller import ConfirmLocationSellerDatabase as DB_confirmation
        data = await state.get_data()
        await DB_confirmation.add_confirm_location_seller(seller_id=data['seller_data']['id'], 
                                                          loader_id=call.from_user.id, 
                                                          text_address=data['confirm_location_seller_text_address'], 
                                                          comment_loader=call.text, photo=data['confirm_location_seller_photo'])
        
        await self.message_answer(call, 'Данные успешно сохранены', None)