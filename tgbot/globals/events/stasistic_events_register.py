from globals.event_dispatcher import on_event
from aiogram import types
from aiogram.fsm.context import FSMContext
from database.system.statistic_events import StatisticEventsDatabase

class StatisticEventsRegister:

    @on_event('new_user_add')
    async def new_user_add(*args, **kwargs):
        call = kwargs.get('call')
        await StatisticEventsDatabase.add_event(call.from_user.id, 'new_user_add')

    @on_event('new_set_offerta')
    async def new_set_offerta(*args, **kwargs):
        call = kwargs.get('call')
        await StatisticEventsDatabase.add_event(call.from_user.id, 'new_set_offerta')

    @on_event('new_set_t_phone')
    async def new_set_t_phone(*args, **kwargs):
        call = kwargs.get('call')
        await StatisticEventsDatabase.add_event(call.from_user.id, 'new_set_t_phone')

    @on_event('after_get_answer_publication_product_photo')
    async def after_get_answer_publication_product_photo(*args, **kwargs):
        call = kwargs.get('call')
        await StatisticEventsDatabase.add_event(call.from_user.id, 'publication_product')

    @on_event('after_get_answer_confirm_location_seller_comment')
    async def after_get_answer_confirm_location_seller_comment(*args, **kwargs):
        call = kwargs.get('call')
        await StatisticEventsDatabase.add_event(call.from_user.id, 'confirm_location_seller_loader')

    @on_event('after_get_answer_categories_search_confirm')
    async def after_get_answer_categories_search_confirm(*args, **kwargs):
        call = kwargs.get('call')
        await StatisticEventsDatabase.add_event(call.from_user.id, 'categories_search')

    @on_event('after_get_answer_seller_survey_confirm')
    async def after_get_answer_seller_survey_confirm(*args, **kwargs):
        call = kwargs.get('call')
        await StatisticEventsDatabase.add_event(call.from_user.id, 'seller_survey')


