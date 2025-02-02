from aiogram import *
from states.states import categories_search as StateCategoriesSearch
from . import *


categorias_search_router = Router()

categorias_search_router.callback_query.register(Categories_search().back_categories_search, lambda c: c.data == 'back_categories_search')

categorias_search_router.callback_query.register(Inline().start_of_step, lambda c: c.data == 'categories_search')
categorias_search_router.inline_query.register(Inline().get_answer, StateCategoriesSearch.inline)
categorias_search_router.message.register(Inline().get_answer, StateCategoriesSearch.inline)
categorias_search_router.callback_query.register(Confirm().get_answer, StateCategoriesSearch.confirm)


