from aiogram import *
from aiogram.fsm.context import FSMContext
from aiogram.filters.command import Command
from states.states import seller_survey as StateSellerSurvey
from handlers.sellers_survey import seller_survey_class
from aiogram.utils.keyboard import InlineKeyboardBuilder


seller_survey_router = Router()

seller_survey_router.callback_query.register(seller_survey_class.seller_survey().back_seller_survey, lambda c: c.data == 'back_seller_survey')

seller_survey_router.callback_query.register(seller_survey_class.seller_survey_category_one_level().start_of_step, lambda c: c.data == 'seller_survey')

seller_survey_router.callback_query.register(seller_survey_class.seller_survey_category_one_level().get_answer, StateSellerSurvey.category_one_level)

seller_survey_router.callback_query.register(seller_survey_class.seller_survey_category_two_level().get_answer, StateSellerSurvey.category_two_level)

seller_survey_router.callback_query.register(seller_survey_class.seller_survey_category_three_level().get_answer, StateSellerSurvey.category_three_level)

seller_survey_router.callback_query.register(seller_survey_class.seller_survey_confirm_category().get_answer, StateSellerSurvey.confirm_category)

seller_survey_router.message.register(seller_survey_class.seller_survey_photo().get_answer, StateSellerSurvey.photo)
seller_survey_router.callback_query.register(seller_survey_class.seller_survey_photo().get_answer, StateSellerSurvey.photo)

seller_survey_router.message.register(seller_survey_class.seller_survey_name_product().get_answer, StateSellerSurvey.name_product)
seller_survey_router.callback_query.register(seller_survey_class.seller_survey_name_product().get_answer, StateSellerSurvey.name_product)

seller_survey_router.callback_query.register(seller_survey_class.seller_survey_confirm().get_answer, StateSellerSurvey.confirm)

