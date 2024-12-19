from config_data.config import BOT_TOKEN
from aiogram import Bot, Dispatcher
from handlers.user import router as user_router
from handlers.location import router as location_router
from handlers.contacts import router as contacts_router
from handlers.organization import router as organization_router
from handlers.publication_product import router as publication_product_router
from handlers.categories_search import router as categories_search_router
from handlers.sellers_survey import router as sellers_survey_router
from handlers.referral_program import router as referral_program_router
from handlers.balanced import router as balanced_router
from handlers.request_response_seller import managment_request_response
from aiogram.filters.command import Command
from aiogram import types



bot = Bot(BOT_TOKEN, parse_mode="HTML")
dp = Dispatcher()
dp.include_router(router=user_router.user_router)
dp.include_router(router=location_router.location_router)
dp.include_router(router=contacts_router.contacts_router)
dp.include_router(router=organization_router.organization_router)
dp.include_router(router=publication_product_router.publication_product_router)
dp.include_router(router=categories_search_router.categorias_search_router)
dp.include_router(router=sellers_survey_router.seller_survey_router)
dp.include_router(router=referral_program_router.referral_program_router)
dp.include_router(router=balanced_router.balanced_router)
dp.include_router(router=managment_request_response.router_request_response)
managment_request_response.Request_response_manager.initRouter()

