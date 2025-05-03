from aiogram import *
from states.states import StateUser
from handlers.general.user.user_class import User
from aiogram.filters.command import Command
from globals.logger_class import CustomLogger
from aiogram import filters




user_router = Router()

user_router.message.register(User.start, Command("start"))
user_router.message.register(User.seller, Command("seller_menu"))
user_router.message.register(User.buyer, Command("buyer_menu"))
user_router.message.register(User.loader, Command("loader_menu"))
user_router.callback_query.register(User.main_menu, lambda c: c.data == 'main_menu')
user_router.callback_query.register(User.seller, lambda c: c.data == 'seller')
user_router.callback_query.register(User.buyer, lambda c: c.data == 'buyer')
user_router.callback_query.register(User.loader, lambda c: c.data == 'loader')
user_router.message.register(User.set_user_city, StateUser.register_buyer_get_city)
user_router.callback_query.register(User.get_city_states, lambda c: c.data == 'get_city_cancel')
user_router.callback_query.register(User.get_city_confirm, lambda c: c.data == 'get_city_confirm')
user_router.callback_query.register(User.profile, lambda c: c.data == 'profile')
user_router.callback_query.register(User.confirm_offerta, lambda c: c.data == 'confirm_offerta')
user_router.message.register(User.set_t_phone, lambda message: message.content_type == 'contact')
user_router.callback_query.register(User.about_bot, lambda c: c.data == 'about_bot')
user_router.callback_query.register(User.get_contacts_helpers, lambda c: c.data == 'contacts_supports')


