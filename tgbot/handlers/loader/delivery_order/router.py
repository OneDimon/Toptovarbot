from aiogram import Router
from handlers.loader.delivery_order.main_class import router as delivery_router

delivery_order_router = Router()
delivery_order_router.include_router(delivery_router)
