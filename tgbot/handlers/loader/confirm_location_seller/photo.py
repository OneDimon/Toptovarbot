from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.system.categories_product import CategoriesProductDatabase as DB_categories_product
from handlers.base_handler_class import StepsBase
from config_data.config import *
from datetime import datetime
import hashlib

class Photo (StepsBase):
    def __init__(self):
        name = 'photo'
        module = 'confirm_location_seller'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        text = 'Прикрепите фото торговой точки продавца'
        return text
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_confirm_location_seller"))
        return builder
    
    async def _before_get_answer(self, call: types.Message, state: FSMContext):
        """Валидация и обработка полученного фото"""
        # Проверяем наличие фото в сообщении
        if not call.photo:
            await call.answer("Пожалуйста, отправьте фото торговой точки")
            return True
            
        # Увеличиваем счетчик попыток
        data_state = await state.get_data()
        if "number_of_attempts" in data_state:
            data_state["number_of_attempts"] += 1
        else:
            data_state["number_of_attempts"] = 1
        await state.update_data(data_state)
        
        # Генерируем уникальный ID для фото
        photo_id = f"location_{call.from_user.id}_{datetime.now().strftime('%Y%m%d%H%M%S')}"
        data_state['location_photo_id'] = photo_id
        await state.update_data(data_state)
        
        return False  # Фото принято
        
    async def _save_answer_data(self, call: types.Message, state: FSMContext):
        """Сохранение фото на диск"""
        data_state = await state.get_data()
        if not call.photo or 'location_photo_id' not in data_state:
            return
            
        # Получаем наибольшее (с лучшим качеством) фото из сообщения
        photo = call.photo[-1]
        file_path = f"img/{data_state['location_photo_id']}.jpg"
        
        # Скачиваем фото
        await call.bot.download(photo.file_id, file_path)
        
        # Сохраняем путь к фото в состоянии
        data_state[self.key_data_in_state] = file_path
        await state.update_data(data_state)

    async def _go_to_next_step(self, call: types.Message, state: FSMContext):
        from . import Comment
        await Comment().start_of_step(call, state)

   
              
