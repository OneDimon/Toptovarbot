from aiogram import *
from states.states import PublicationProduct as StatePublication_product
from . import *
from globals.logger_class import CustomLogger

publication_product_router = Router()

publication_product_router.callback_query.register(Name().start_of_step, lambda c: c.data == 'publication_product')
publication_product_router.callback_query.register(PublicationProduct.back_publication_product, lambda c: c.data == 'back_publication_product')
publication_product_router.message.register(Name().get_answer, StatePublication_product.name)
publication_product_router.message.register(Description().get_answer, StatePublication_product.description)
publication_product_router.inline_query.register(CategoriesInline().get_answer, StatePublication_product.categories_inline)
publication_product_router.message.register(CategoriesInline().get_answer, StatePublication_product.categories_inline)
publication_product_router.message.register(Price().get_answer, StatePublication_product.price)
publication_product_router.message.register(Photo().get_answer, StatePublication_product.photo)
publication_product_router.error.register(CustomLogger('logs/error_logs/publication_product.log').loging_hanlder_errors)








