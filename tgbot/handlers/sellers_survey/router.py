from aiogram import *
from states.states import SellerSurvey as StateSellerSurvey
from . import *
from globals import CustomLogger

seller_survey_router = Router()
seller_survey_router.callback_query.register(SellerSurvey().back_seller_survey, lambda c: c.data == 'back_seller_survey')
seller_survey_router.callback_query.register(CategoriesInline().start_of_step, lambda c: c.data == 'seller_survey')
seller_survey_router.inline_query.register(CategoriesInline().get_answer, StateSellerSurvey.categories_inline)
seller_survey_router.message.register(CategoriesInline().get_answer, StateSellerSurvey.categories_inline)
seller_survey_router.callback_query.register(ConfirmCategory().get_answer, StateSellerSurvey.confirm_category)
seller_survey_router.message.register(Photo().get_answer, StateSellerSurvey.photo)
seller_survey_router.callback_query.register(Photo().get_answer, StateSellerSurvey.photo)
seller_survey_router.message.register(NameProduct().get_answer, StateSellerSurvey.name_product)
seller_survey_router.callback_query.register(NameProduct().get_answer, StateSellerSurvey.name_product)
seller_survey_router.callback_query.register(Confirm().get_answer, StateSellerSurvey.confirm)
seller_survey_router.error.register(CustomLogger('logs/error_logs/sellers_survey.log').loging_hanlder_errors)

