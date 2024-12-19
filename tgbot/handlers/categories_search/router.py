from aiogram import *
from aiogram.fsm.context import FSMContext
from aiogram.filters.command import Command
from states.states import categories_search as StateCategoriesSearch
from handlers.categories_search import categories_search_class
from aiogram.utils.keyboard import InlineKeyboardBuilder


categorias_search_router = Router()

categorias_search_router.callback_query.register(categories_search_class.Categories_search().back_categories_search, lambda c: c.data == 'back_categories_search')

categorias_search_router.callback_query.register(categories_search_class.categories_search_category_one_level().start_of_step, lambda c: c.data == 'categories_search')

categorias_search_router.callback_query.register(categories_search_class.categories_search_category_one_level().get_answer, StateCategoriesSearch.category_one_level)

categorias_search_router.callback_query.register(categories_search_class.categories_search_category_two_level().get_answer, StateCategoriesSearch.category_two_level)

categorias_search_router.callback_query.register(categories_search_class.categories_search_category_three_level().get_answer, StateCategoriesSearch.category_three_level)

categorias_search_router.callback_query.register(categories_search_class.categories_search_confirm().get_answer, StateCategoriesSearch.confirm)
