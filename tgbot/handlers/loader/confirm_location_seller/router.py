from aiogram import Router, F
from states.states import ConfirmLocationSeller
from globals import CustomLogger
from . import NameSeller, TextAddress, Photo
from .main_class import ConfirmLocationSeller as ConfirmLocationSellerClass



# Создаем роутер для подтверждения местоположения продавца
confirm_seller_location_router = Router()

confirm_seller_location_router.callback_query.register(ConfirmLocationSellerClass.back_confirm_location_seller, F.data == 'back_confirm_location_seller')

confirm_seller_location_router.callback_query.register(NameSeller().start_of_step, F.data == 'confirm_location_seller')
confirm_seller_location_router.message.register(NameSeller().get_answer, ConfirmLocationSeller.name)

confirm_seller_location_router.message.register(TextAddress().get_answer, ConfirmLocationSeller.text_address)

confirm_seller_location_router.message.register(Photo().get_answer, ConfirmLocationSeller.photo)

confirm_seller_location_router.error.register(CustomLogger('logs/error_logs/confirm_location_seller.log').loging_hanlder_errors)



