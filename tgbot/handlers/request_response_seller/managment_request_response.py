from aiogram import *
from handlers.request_response_seller.response_seller import ResponseSeller
from handlers.request_response_seller.request_response_states import ResponseSeller as RS_state
from aiogram.fsm.context import FSMContext
from globals import CustomLogger

router_request_response = Router()
respons_obj = ResponseSeller()


class RequestResponseManager:
    
    def initRouter():
        global router_request_response
        router_request_response.callback_query.register(respons_obj.photo_product, RS_state.there_is_a_product)
        router_request_response.callback_query.register(respons_obj.there_is_a_product_button_click, lambda c: c.data == 'there_is_a_product_button', RS_state.start)
        router_request_response.callback_query.register(respons_obj.no_product_button_click, lambda c: c.data == 'no_product_button', RS_state.start)
        router_request_response.callback_query.register(respons_obj.there_is_similar_product_button_click, lambda c: c.data == 'there_is_similar_product_button', RS_state.start)
        router_request_response.callback_query.register(respons_obj.await_product_button_click, lambda c: c.data == 'await_product_button', RS_state.start)
        router_request_response.callback_query.register(respons_obj.click_await_back, lambda c: c.data == 'await_product_back', RS_state.wait_poduct)
        router_request_response.callback_query.register(respons_obj.click_await_1_day, lambda c: c.data == 'await_product_1_day', RS_state.wait_poduct)
        router_request_response.callback_query.register(respons_obj.click_await_3_day, lambda c: c.data == 'await_product_3_day', RS_state.finish)
        router_request_response.callback_query.register(respons_obj.click_await_5_day, lambda c: c.data == 'await_product_5_day', RS_state.wait_poduct)
        router_request_response.callback_query.register(respons_obj.click_await_7_day, lambda c: c.data == 'await_product_7_day', RS_state.wait_poduct)
        router_request_response.callback_query.register(RequestResponseManager.responseButtonClik, lambda c: c.data == 'response_button')
        router_request_response.message.register(respons_obj.photo_product, RS_state.there_is_a_product)
        router_request_response.message.register(respons_obj.name_product, RS_state.there_is_a_product_photo_uploaded)
        router_request_response.callback_query.register(respons_obj.price_product_click_back, lambda c: c.data == 'price_product_click_back', RS_state.there_is_a_product_name_uploaded)
        router_request_response.callback_query.register(respons_obj.price_product_click_missing, lambda c: c.data == 'price_product_click_missing', RS_state.there_is_a_product_name_uploaded)
        router_request_response.message.register(respons_obj.price_product, RS_state.there_is_a_product_name_uploaded)
        router_request_response.message.register(respons_obj.quantity_product, RS_state.there_is_a_product_price_uploaded)

        router_request_response.callback_query.register(respons_obj.price_product_click_back, lambda c: c.data == 'price_product_click_back', RS_state.there_is_a_product_name_uploaded)
        router_request_response.callback_query.register(respons_obj.price_product_click_missing, lambda c: c.data == 'price_product_click_missing', RS_state.there_is_a_product_name_uploaded)

        router_request_response.callback_query.register(respons_obj.add_more_goods_click, lambda c: c.data == 'add_more_goods_click', RS_state.there_is_a_product_quantity_uploaded)   
        router_request_response.callback_query.register(respons_obj.finally_adding_click, lambda c: c.data == 'finall_adding_click', RS_state.there_is_a_product_quantity_uploaded)

        router_request_response.error.register(CustomLogger('logs/error_logs/request_response.log').loging_hanlder_errors)

    async def responseButtonClik(call: types.CallbackQuery, state: FSMContext):
        global router_request_response
        await respons_obj.send_request_info(call, state)







        
        



        







