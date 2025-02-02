from aiogram import *
from states.states import seller_survey as StateSellerSurvey
from . import *


seller_survey_router = Router()
seller_survey_router.callback_query.register(Seller_survey().back_seller_survey, lambda c: c.data == 'back_seller_survey')
seller_survey_router.callback_query.register(Categories_inline().start_of_step, lambda c: c.data == 'seller_survey')
seller_survey_router.inline_query.register(Categories_inline().get_answer, StateSellerSurvey.categories_inline)
seller_survey_router.message.register(Categories_inline().get_answer, StateSellerSurvey.categories_inline)
seller_survey_router.callback_query.register(Confirm_category().get_answer, StateSellerSurvey.confirm_category)
seller_survey_router.message.register(Photo().get_answer, StateSellerSurvey.photo)
seller_survey_router.callback_query.register(Photo().get_answer, StateSellerSurvey.photo)
seller_survey_router.message.register(Name_product().get_answer, StateSellerSurvey.name_product)
seller_survey_router.callback_query.register(Name_product().get_answer, StateSellerSurvey.name_product)
seller_survey_router.callback_query.register(Confirm().get_answer, StateSellerSurvey.confirm)

