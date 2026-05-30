from aiogram import Router
from handlers.buyer.delivery_order.main_class import router as delivery_router

buyer_delivery_router = Router()
buyer_delivery_router.include_router(delivery_router)
