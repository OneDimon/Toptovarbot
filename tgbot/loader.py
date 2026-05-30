from config_data.config import BOT_TOKEN
from globals.events import *
from aiogram import Bot, Dispatcher
from handlers.general.user.router import user_router
from handlers.seller.location.router import location_router as location_seller_router
from handlers.seller.contacts.router import contacts_router
from handlers.seller.organization.router import organization_router
from handlers.seller.publication_product.router import publication_product_router
from handlers.buyer.categories_search.router import categorias_search_router
from handlers.buyer.sellers_survey.router import seller_survey_router
from handlers.general.referral_program.router import referral_program_router
from handlers.general.balanced.router import balanced_router
from handlers.seller.request_response_seller.managment_request_response import router_request_response, RequestResponseManager
from handlers.loader.location.router import location_router as location_loader_router
from handlers.loader.confirm_location_seller.router import confirm_seller_location_router
from handlers.admin.router import admin_router
from handlers.loader.delivery_order.router import delivery_order_router
from handlers.buyer.delivery_order.router import buyer_delivery_router



bot = Bot(BOT_TOKEN, parse_mode="HTML")
dp = Dispatcher()
dp.include_router(router=user_router)
dp.include_router(router=location_seller_router)
dp.include_router(router=contacts_router)
dp.include_router(router=organization_router)
dp.include_router(router=publication_product_router)
dp.include_router(router=categorias_search_router)
dp.include_router(router=seller_survey_router)
dp.include_router(router=referral_program_router)
dp.include_router(router=balanced_router)
dp.include_router(router=router_request_response)
RequestResponseManager.initRouter()
dp.include_router(router=location_loader_router)
dp.include_router(router=confirm_seller_location_router)
dp.include_router(router=admin_router)
dp.include_router(router=delivery_order_router)
dp.include_router(router=buyer_delivery_router)


