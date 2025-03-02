from aiogram import *
from states.states import CategoriesSearch as StateCategoriesSearch
from . import *
from globals import CustomLogger


categorias_search_router = Router()

categorias_search_router.callback_query.register(CategoriesSearch().back_categories_search, lambda c: c.data == 'back_categories_search')

categorias_search_router.callback_query.register(Inline().start_of_step, lambda c: c.data == 'categories_search')
categorias_search_router.inline_query.register(Inline().get_answer, StateCategoriesSearch.inline)
categorias_search_router.message.register(Inline().get_answer, StateCategoriesSearch.inline)
categorias_search_router.callback_query.register(Confirm().get_answer, StateCategoriesSearch.confirm)
categorias_search_router.error.register(CustomLogger('logs/error_logs/categories_search.log').loging_hanlder_errors)


