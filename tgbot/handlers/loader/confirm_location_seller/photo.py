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

    async def _after_get_answer(self, call: types.Message, state: FSMContext):
        """Обработка после получения ответа"""
        await self.__response_finish(call, state)
        await self.__save_attemt_confirm(call, state)

    async def __response_finish(self, call: types.Message, state: FSMContext):
        """Отправка сообщения об успешном завершении процесса"""
        text = await self.__get_respronse_finish_text() 
        keyboard = await self.__get_inline_keyboard_for_finish(call, state)
        await self.message_answer(call, text, keyboard)

    async def __get_respronse_finish_text(self):
        """Получение текста сообщения об успешном завершении"""
        return "Адрес принят на проверку. Благодарим за содействие!"
    
    async def __get_inline_keyboard_for_finish(self, call: types.Message, state: FSMContext):
        """Клавиатура для завершающего сообщения"""
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🏠 В главное меню", callback_data="main_menu"))
        return builder.as_markup()

    async def __save_attemt_confirm(self, call: types.Message, state: FSMContext):
        """Сохранение данных подтверждения местоположения продавца в базу данных"""
        from database.loader.confirm_location_seller import ConfirmLocationSellerDatabase as DB
        data_state = await state.get_data()
        
        # Проверяем наличие всех необходимых данных
        if not all(key in data_state for key in ['seller_data', 'confirm_location_seller_text_address', 'confirm_location_seller_photo']):
            # Если каких-то данных нет, получаем их из состояния или используем значения по умолчанию
            seller_id = data_state.get('seller_data', {}).get('id', 0)
            text_address = data_state.get('confirm_location_seller_text_address', '')
            photo_path = data_state.get('confirm_location_seller_photo', '')
            comment = data_state.get('confirm_location_seller_comment_loader', '')
        else:
            # Получаем данные из состояния
            seller_id = data_state['seller_data']['id']
            text_address = data_state['confirm_location_seller_text_address']
            photo_path = data_state['confirm_location_seller_photo']
            comment = data_state.get('confirm_location_seller_comment_loader', '')
        
        # Сохраняем данные в базу
        await DB.add_confirm_location_seller(
            seller_id,
            call.from_user.id,
            text_address,
            comment,
            photo_path
        )
        
        # Очищаем состояние
        await state.clear()
        
              
