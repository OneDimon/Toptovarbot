from database.request_response_seller.request_response_seller import Request_response_seller_database as DB
import aiogram
import asyncio
from aiogram import Bot, Dispatcher, types
from aiogram.filters import Command
from datetime import datetime, timedelta
from aiogram.fsm.context import FSMContext
from aiogram.fsm.state import StatesGroup, State
from handlers.request_response_seller.request_response_states import ResponseSeller as RS_state
from modules.photo_verification_modules import Photo_verification_modules
import hashlib
from aiogram.types import FSInputFile



class Response_seller():
    
    async def send_message_seller(self, id_seller: int):
        response = await DB().get_respnse_in_progress(id_seller)
        if len(await DB().get_respnse_in_progress(id_seller)) == 0:
            await self.__send_message(id_seller)

    async def send_request_info(self, call: types.CallbackQuery, state: FSMContext):
        request_info = await DB().get_request_info_fields(call.from_user.id)
        if request_info == None:
            await call.message.answer("На данный момент нет активных запросов")
        await DB().set_request_status_in_progress(request_info['request_id'])
        await state.set_state(RS_state.start)

        datetime_request = request_info['datetime_request']

        seller_id = call.from_user.id

        remaining_minutes_ad  = (datetime_request + timedelta(minutes=20) - datetime.now()).total_seconds() // 60
        remaining_minutes_request  = (datetime_request + timedelta(minutes=15) - datetime.now()).total_seconds() // 60

        str_response_one = (f"Данный запрос актуален {remaining_minutes_request} минут через {remaining_minutes_ad} минут после прихода данного сообщения; " 
                          f"реклама продукции не принимается и не будет передана покупателю по его запросу " )
        
        str_response_two = (f"категория :{request_info['categoy_all'][0]}->{request_info['categoy_all'][1]}->{request_info['categoy_all'][2]} названи е :{request_info['product']} "
                          f"фото")
        inline_keyboard = await self.__get_inline_request_info()
        
        await state.update_data(data = {'text': (str_response_one+str_response_two),
                                         'inline_keyboard': inline_keyboard, 
                                         'request_id': request_info['request_id'],
                                        'response': [],
                                        'seller_id': seller_id})
        if request_info['photo'] == "":
            await call.message.answer(str_response_one+str_response_two, reply_markup=inline_keyboard)
            return
        photo = FSInputFile(request_info['photo'])
        await call.bot.send_photo(call.from_user.id, photo, caption=str_response_one+str_response_two, reply_markup=inline_keyboard)
        return True
        
    async def there_is_a_product_button_click(self, call: types.CallbackQuery, state: FSMContext):
        await call.message.answer("Отправьте фото товара")
        await state.set_state(RS_state.there_is_a_product)

    async def no_product_button_click(self, call: types.CallbackQuery, state: FSMContext):
        await DB().set_response_no_product(state.get_data()['request_id'])
        await self.__send_finish_response(call, state)


    async def there_is_similar_product_button_click(self, call: types.CallbackQuery, state: FSMContext):
        await self.there_is_a_product_button_click(call, state), 

    async def await_product_button_click(self, call: types.CallbackQuery, state: FSMContext):
        inline_keyboard = await self.__get_inline_await_product()
        await state.set_state(RS_state.wait_poduct)
        await call.message.answer("Через какой промежуток времени можно обратиться к вам с этим запросом?", reply_markup=inline_keyboard)

    async def click_await_back(self, call: types.CallbackQuery, state: FSMContext):
        data = await self.__getDataContext(state)
        await call.message.answer(data['text'], reply_markup=data['inline_keyboard'])

    async def click_await_1_day(self, call: types.CallbackQuery, state: FSMContext):
        data = await self.__getDataContext(state)
        await DB().set_response_await_product(data['request_id'], 1)
        await self.__send_finish_response(call, state)

    async def click_await_3_day(self, call: types.CallbackQuery, state: FSMContext):
        data = await self.__getDataContext(state)
        await DB().set_response_await_product(data['request_id'], 3)
        await self.__send_finish_response(call, state)

    async def click_await_5_day(self, call: types.CallbackQuery, state: FSMContext):
        data = await self.__getDataContext(state)
        await DB().set_response_await_product(data['request_id'], 5)
        await self.__send_finish_response(call, state)

    async def click_await_7_day(self, call: types.CallbackQuery, state: FSMContext):
        data = await self.__getDataContext(state)
        await DB().set_response_await_product(data['request_id'], 7)
        await self.__send_finish_response(call, state)
    
    async def photo_product(self, message: types.Message, state: FSMContext):
        data_context = await self.__getDataContext(state)

        if ('number_of_attempts' in data_context):
            data_context['number_of_attempts'] += 1
        else:
            data_context['number_of_attempts'] = 1

        result_photo_verification = await Photo_verification_modules.photo_verification(message, data_context['number_of_attempts'])

        if result_photo_verification:
            await state.set_state(RS_state.there_is_a_product_photo_uploaded)
            await message.bot.download(result_photo_verification, F'{os.getcwd()}/tgbot/img/{result_photo_verification}.jpg')

            if 'number_item' in data_context:
                data_context['number_item'] += 1
            else:
                data_context['number_item'] = 0
            data_context['response'].append({'photo' : f'{os.getcwd()}/tgbot/img/{result_photo_verification}.jpg'})
        await message.answer("Ведите название продукции")
        await state.update_data(data = data_context)

    async def name_product(self, message: types.Message, state: FSMContext):
        if (message.text):
            data_context = await self.__getDataContext(state)
            data_context['response'][data_context['number_item']]['name'] = message.text
            await state.update_data(data = data_context)
            await state.set_state(RS_state.there_is_a_product_name_uploaded)
            await message.answer("Ведите цену продукции", reply_markup=await self.__get_inline_price_product())
        else:
            await message.answer("Ведите название продукции буквами")

    async def price_product_click_back(self, call: types.CallbackQuery, state: FSMContext):
        await state.set_state(RS_state.there_is_a_product_photo_uploaded)
        await call.message.answer("Ведите название продукции")

    async def price_product_click_missing(self, call: types.CallbackQuery, state: FSMContext):
        data_context = await self.__getDataContext(state)
        data_context['response'][data_context['number_item']]['price'] = 'не указана'
        await state.set_state(RS_state.there_is_a_product_price_uploaded)
        await state.update_data(data = data_context)
        await call.bot.send_message(call.from_user.id, text="Ведите количество продукции", reply_markup=await self.__get_inline_quantity_product())


    async def price_product(self, message: types.Message, state: FSMContext):
        data_context = await self.__getDataContext(state)
        if (message.text and message.text.isdigit()):
            data_context['response'][data_context['number_item']]['price'] = message.text
            await message.answer("Ведите количество продукции", reply_markup=await self.__get_inline_quantity_product())
            await state.set_state(RS_state.there_is_a_product_price_uploaded)
            await state.update_data(data = data_context)
        else:
            await message.answer("Ведите цену продукции числом")

    async def quantity_product(self, message: types.Message, state: FSMContext):
        data_context = await self.__getDataContext(state)
        data_context['response'][data_context['number_item']]['quantity'] = message.text
        data_context['response_hash'] = await self.__get_hash_response(data_context)
        await state.set_state(RS_state.there_is_a_product_quantity_uploaded)
        await state.update_data(data = data_context)
        await self._save_product(message, state)

    async def quantity_product_click_back(self, call: types.CallbackQuery, state: FSMContext):
        await state.set_state(RS_state.there_is_a_product_price_uploaded)
        await call.message.answer("Ведите цену продукции")

    async def quantity_product_click_missing(self, call: types.CallbackQuery, state: FSMContext):
        data_context = await self.__getDataContext(state)
        data_context['response'][data_context['number_item']]['quantity'] = 'не указана'
        await state.set_state(RS_state.there_is_a_product_quantity_uploaded)
        await state.update_data(data = data_context)
        await self._save_product(call, state)

    async def add_more_goods_click(self, call: types.CallbackQuery, state: FSMContext):
        data_context = await self.__getDataContext(state)
        data_context['number_attempts'] = 0
        await state.update_data(data = data_context)
        await self.there_is_a_product_button_click(call, state)

    async def finally_adding_click(self, call: types.CallbackQuery, state: FSMContext):
        data_context = await self.__getDataContext(state)
        await DB().set_respons_finish_seller(data_context['request_id'])
        await self.__send_finish_response(call, state)

    async def _save_product(self, mess_or_call: types.Message|types.CallbackQuery, state: FSMContext):
        data_context = await self.__getDataContext(state)
        await DB().set_response_goods_seller(data_context['response_hash'], data_context['response'][data_context['number_item']], data_context['seller_id'])
        await mess_or_call.bot.send_message(mess_or_call.from_user.id, text = "Ваш товар принят. Данные будут переданного покупателю", reply_markup=await self.__get_inline_goods_acept())
    async def __get_hash_response(self, data_context):
        if ('response_hash' in data_context):
            return data_context['response_hash']
        else:
            response_hash = hashlib.md5(str(data_context['response']).encode('utf-8') + datetime.now().strftime("%Y-%m-%d %H:%M:%S").encode('utf-8')).hexdigest()
            return response_hash
        
    async def __get_inline_price_product(self):
        back = aiogram.types.InlineKeyboardButton(text="⬅️ Назад", callback_data='price_product_click_back')
        missing = aiogram.types.InlineKeyboardButton(text="⏩ Пропустить", callback_data='price_product_click_missing')
        inline_price_markup = aiogram.types.InlineKeyboardMarkup(inline_keyboard=[[back, missing]])
        return inline_price_markup

    async def __get_inline_quantity_product(self):
        back = aiogram.types.InlineKeyboardButton(text="⬅️ Назад", callback_data='quantity_product_click_back')
        missing = aiogram.types.InlineKeyboardButton(text="⏩ Пропустить", callback_data='quantity_product_click_missing')
        inline_quantity_markup = aiogram.types.InlineKeyboardMarkup(inline_keyboard=[[back, missing]])
        return inline_quantity_markup

    async def __get_inline_goods_acept(self):
        add_more_goods = aiogram.types.InlineKeyboardButton(text="➕ Добавить еще аналогичный товар", callback_data='add_more_goods_click')
        finall_adding = aiogram.types.InlineKeyboardButton(text="✅ Завершить добавление", callback_data='finall_adding_click')
        inline_goods_markup = aiogram.types.InlineKeyboardMarkup(inline_keyboard=[[add_more_goods, finall_adding]])
        return inline_goods_markup

    async def __get_inline_request_info(self):
        there_is_a_product = aiogram.types.InlineKeyboardButton(text="✅ Есть товар", callback_data='there_is_a_product_button')
        no_product = aiogram.types.InlineKeyboardButton(text="❌ Нет товара", callback_data='no_product_button') 
        there_is_similar_product = aiogram.types.InlineKeyboardButton(text="🔍 Есть похожий", callback_data='there_is_similar_product_button')
        await_product = aiogram.types.InlineKeyboardButton(text="⏳ Ожидаю товар", callback_data='await_product_button')
        inline_request_markup = aiogram.types.InlineKeyboardMarkup(inline_keyboard=[[there_is_a_product, no_product, there_is_similar_product, await_product]])
        return inline_request_markup


    async def __send_message(self, id_seller: int):
        inline_request_button = aiogram.types.InlineKeyboardButton(text="👌 ответить", callback_data='response_button')
        inline_request_markup = aiogram.types.InlineKeyboardMarkup(inline_keyboard=[[inline_request_button]])
        bot = aiogram.Bot("6799809082:AAHLFNSkurXTr_jToBMsc4i2xKuCRz-rS44")
        await bot.send_message(id_seller, "у вас есть новый запрос", reply_markup=inline_request_markup)

    async def __get_inline_await_product(self):
        await_product_back = aiogram.types.InlineKeyboardButton(text="↘️назад", callback_data='await_product_back')
        await_product_1_day = aiogram.types.InlineKeyboardButton(text="1️⃣1 день", callback_data='await_product_1_day')
        await_product_3_day = aiogram.types.InlineKeyboardButton(text="3️⃣3 дня", callback_data='await_product_3_day')
        await_product_5_day = aiogram.types.InlineKeyboardButton(text="5️⃣5 дней", callback_data='await_product_5_day')
        await_product_7_day = aiogram.types.InlineKeyboardButton(text="7️⃣7 дней", callback_data='await_product_7_day')

        inline_request_markup = aiogram.types.InlineKeyboardMarkup(inline_keyboard=[[await_product_back,
                                                                                    await_product_1_day,
                                                                                    await_product_3_day, 
                                                                                    await_product_5_day, 
                                                                                    await_product_7_day]])
        return inline_request_markup
    
    async def __send_finish_response(self, call: types.CallbackQuery, state: FSMContext):
       await call.message.answer("👍!")
       await state.clear()

    async def __getDataContext(self, state: FSMContext):
        context_data = await state.get_data()
        return context_data