from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import StepsBase
from config_data.config import *
from aiogram.types import InlineQueryResultArticle, InputTextMessageContent
from modules.search_categories_module import SearchCategoriesModules

class CategoriesInline (StepsBase):
    def __init__(self):
        name = 'categories_inline'
        module = 'publication_product'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        return 'Нажмите кнопку "начать поиск" и введите название товара или категорию.'
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="🔍 Начать поиск", switch_inline_query_current_chat=""))
        return builder

    
    async def get_answer(self, mess: types.InlineQuery|types.Message, state: FSMContext):
        if type(mess) == types.InlineQuery:
            await self._process_inline_query(mess)
        elif type(mess) == types.Message:
            await self._process_message(mess, state)


    async def _process_inline_query(self, inline: types.InlineQuery):
        query_text = inline.query
        categories = await SearchCategoriesModules().search_categories(query_text)
        results = []
        for categorie in categories:
            results.append(
                InlineQueryResultArticle(
                    id=str(categorie[4]),
                    title=categorie[3],
                    input_message_content=InputTextMessageContent(
                        message_text=f"Вы выбрали категорию: {categorie[1] + '->' + categorie[2] + '->' + categorie[3]}", parse_mode="HTML"
                    ),
                    description=f"{categorie[1] + '->' + categorie[2] + '->' + categorie[3]}",
                )
            )
        if len(results) == 0:
            results.append(
                InlineQueryResultArticle(
                    id=str('not_found'),
                    title="Ничего не найдено",
                    input_message_content=InputTextMessageContent(
                        message_text="Ничего не найдено"
                    ),
                    description="Ничего не найдено"
                )
            )
        await inline.bot.answer_inline_query(inline.id, results=results, cache_time=1)

    async def _process_message(self, message: types.Message, state: FSMContext):
        import re
        pattern = re.compile(r"^Вы выбрали категорию: ([^->]+)->([^->]+)->([^->]+)$", re.UNICODE)
        match = pattern.match(message.text)
        data_state = await state.get_data()
        
        if match:
            data_state['publication_product_category_one_level'], data_state['publication_product_category_two_level'], data_state['publication_product_category_three_level'] = [match.group(1).strip().lower(), match.group(2).strip().lower(), match.group(3).strip().lower()]
            await state.update_data(data_state)
            await self._go_to_next_step(message, state)
        else:
            await message.answer("Ошибка: строка не соответствует ожидаемому формату")
            await self.start_of_step(message, state)

    async def _go_to_next_step(self, message: types.Message, state: FSMContext): 
        from . import Price
        await Price().start_of_step(message, state)


