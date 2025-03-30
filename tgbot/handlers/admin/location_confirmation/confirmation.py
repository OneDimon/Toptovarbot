from aiogram import types
from handlers.base_handler_class import StepsBase
from aiogram.fsm.context import FSMContext
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.types import  InputMediaPhoto, FSInputFile

class Confirmation(StepsBase):
    def __init__(self):
        name = 'confirmation'
        module = 'location_confirmation'
        super().__init__(name, module)

    async def _before_start_of_step(self, call, state):
        data_state = await state.get_data()
        from database.loader.confirm_location_seller import ConfirmLocationSellerDatabase as DB_confirmation
        from database.seller.location_seller import LocationSellerDatabase as DB_location
        from database.general.users import UsersDatabase as DB_users
        data_confirmation_locations = await DB_confirmation.get_pending_confirmations()
        if not data_confirmation_locations:
            await call.answer(text='Нет новых заявок на подтверждение местоположения.')
            return True
        data_confirmation_location = data_confirmation_locations[0]
        data_location_seller = await DB_location.get_location(data_confirmation_location['seller_id'])
        data_user = await DB_users.get_user_from_user_id(data_location_seller['user_id'])
        data_state['location_data'] = data_location_seller
        data_state['confirmation_data'] = data_confirmation_location
        data_state['user_data'] = data_user
        await state.update_data(data_state)

    async def _send_a_question(self, call, state):
        builder = await self._get_builder_inline_keyboard_for_question(call, state)
        text = await self._get_text_for_question(call, state)
        data_state = await state.get_data()
        location_photo = data_state['location_data']['photo']
        if location_photo:
            media = [
                InputMediaPhoto(media=FSInputFile(data_state['location_data']['photo'])),
                InputMediaPhoto(media=FSInputFile(data_state['confirmation_data']['photo']))
            ]
        else:
            media = [
                InputMediaPhoto(media=FSInputFile(data_state['confirmation_data']['photo']))
            ]
        message = await call.bot.send_media_group(call.from_user.id, media=media)
        message = await call.bot.send_message(call.from_user.id, text=text, reply_markup=builder.as_markup())
        message_id = message.message_id
        return message_id
    
    async def _get_text_for_question(self, call: types.CallbackQuery, state: FSMContext):
        text = 'Пожалуйста, подтвердите или отмените локацию. Фото слева - продавец, справа - подтверждение грузчика. Если фото одно то это фото грузчика.'
        text += '\n\n'
        text += await self.__get_text_from_question_data_seller(call, state)
        text += '\n\n'
        text += await self.__get_text_from_question_data_confirmation(call, state)
        return text
    
    async def __get_text_from_question_data_seller(self, call: types.CallbackQuery, state: FSMContext):
        data_state = await state.get_data()
        location_state = data_state['location_data']
        str_location = 'Продавец ввел адресс: ' + location_state['name_of_place']
        if location_state['sector']:
            str_location += ", " + location_state['sector']
        if location_state['building']:
            str_location += ", " + location_state['building']
        if location_state['floar']:
            str_location += ", этаж " + location_state['floar']
        if location_state['line']:
            str_location += ", ряд " + location_state['line']
        if location_state['place']:
            str_location += ", место " + location_state['place']
        if location_state['address']:
            str_location += ", " + location_state['address']
        return str_location
    
    async def __get_text_from_question_data_confirmation(self, call: types.CallbackQuery, state: FSMContext):
        data_state = await state.get_data()
        confirmation_state = data_state['confirmation_data']
        str_location = 'Информация предоставленная грузчиком: '
        str_location += 'Грузчик ввел адресс: ' + confirmation_state['text_address']
        str_location += '\n' + 'Грузчик ввел комментарий: ' + confirmation_state['comment_loader']
        str_location += '\n' + 'Грузчик подтверждает адресс продавца: ' + data_state['user_data']['name']
        return str_location


    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery, state: FSMContext):
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(text="Подтвердить локацию", callback_data="confirm_location"))
        builder.row(types.InlineKeyboardButton(text="Отменить локацию", callback_data="cancel_location"))
        builder.row(types.InlineKeyboardButton(text="Назад", callback_data="admin"))
        return builder

    async def _after_get_answer(self, call, state):
        data_state = await state.get_data()
        if (call.data == 'confirm_location'):
            data_state['confirmation_data']['confirmed'] = True
        if (call.data == 'cancel_location'):
            data_state['confirmation_data']['confirmed'] = False
        data_state['confirmation_data']['confirmind_id'] = call.from_user.id
        data_state['confirmation_data']['checked'] = True
        await state.update_data(data_state)

    async def _go_to_next_step(self, call, state):
        from . import Comment
        await Comment().start_of_step(call=call, state=state)

