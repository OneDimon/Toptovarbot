from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import  StepsBase

class Line(StepsBase):
    def __init__(self):
        name = 'line'
        module = 'location_loader'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели, " + data_state[self.key_data_in_state] + "\n" + "Введите ряды или оставьте текущие." 
        else:
            return "Введите ряды числами через запятую, например 1,4,8,10?"
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="⬅️ Назад", callback_data="back_location_loader"))
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from . import Description
        await Description().start_of_step(call, state)

    async def _before_get_answer(self, message: types.Message, state: FSMContext):
        data_state = await state.get_data()
        from database.loader.location_loader import LocationLoaderDatabase as DB_location_loader
        location_line = await self.__process_string_lines(message.text)
        if location_line:
            data_state['location_loader_line'] = location_line
            await state.update_data(data_state)
        else:
            await message.answer("Вы ввели некорректные данные, попробуйте снова.")
            return True
        
    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        return
        
    async def __process_string_lines(self, string: str):
        result = []
        parts = string.split(',')
        for part in parts:
            stripped_part = part.strip()  # Удаляем пробелы
            if stripped_part.isdigit():  # Проверяем, что строка состоит только из цифр
                result.append(int(stripped_part))  # Преобразуем в целое число и добавляем в результат
            else:
                return False      
        return result

        


        



