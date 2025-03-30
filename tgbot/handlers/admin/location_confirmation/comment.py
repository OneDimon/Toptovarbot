from aiogram import types
from handlers.base_handler_class import StepsBase
from aiogram.fsm.context import FSMContext
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.types import  InputMediaPhoto

class Comment(StepsBase):
    def __init__(self):
        name = 'comment'
        module = 'location_confirmation'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call, state):
        return 'Введите комментарий'
    
    async def _get_builder_inline_keyboard_for_question(self, call, state):
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text='Назад', callback_data='back_location_confirmation'))
        return builder
    
    async def _after_get_answer(self, call, state):
        from database.loader.confirm_location_seller import ConfirmLocationSellerDatabase as DB
        data = await state.get_data()
        data = data['confirmation_data']
        data['comment'] = call.text
        await DB.check_confirmation(data['id'], checked=data['checked'], confirmind_id=data['confirmind_id'], confirmed=data['confirmed'], comment_admin=data['comment'])
        await self.message_answer(call, 'данные сохранены')

    async def _go_to_next_step(self, call, state):
        from handlers.admin.menu.main_class import AdminMenu
        await AdminMenu.admin_menu(call)