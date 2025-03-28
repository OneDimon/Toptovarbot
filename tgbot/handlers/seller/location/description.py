from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from handlers.base_handler_class import BaseHandler, StepsBase
from aiogram.types import FSInputFile

class Description(StepsBase):
    def __init__(self):
        name = 'description'
        module = 'location'
        super().__init__(name, module)

    async def _send_a_question(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        builder = await self._get_builder_inline_keyboard_for_question(call, state)
        text = await self._get_text_for_question(call, state)
        data_state = await state.get_data()
        if 'location_photo' in data_state and data_state['location_photo']:
            photo = FSInputFile(data_state['location_photo'])
            message = await call.bot.send_photo(call.from_user.id, photo, caption=text, reply_markup=builder.as_markup())
            message_id = message.message_id
        else:
            message_id = await BaseHandler.message_answer(call, text, builder.as_markup())
        return message_id
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        str_location = 'Вы добавили адресс: ' + data_state['location_name']
        if data_state['location_sector']:
            str_location += ", " + data_state['location_sector']
        if data_state['location_building']:
            str_location += ", " + data_state['location_building']
        if data_state['location_floar']:
            str_location += ", этаж " + data_state['location_floar']
        if data_state['location_line']:
            str_location += ", ряд " + data_state['location_line']
        if data_state['location_place']:
            str_location += ", место " + data_state['location_place']
        if data_state['location_address']:
            str_location += ", " + data_state['location_address']
        
        str_location += "\n" + "Вы можете изменить локацию в любой момент в личном кабинете"
        return str_location

    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        data_state = await state.get_data()
        if 'id_location_in_db' in data_state and data_state['id_location_in_db']:
            builder.row(types.InlineKeyboardButton(text="✅ Завершить редактирование", callback_data="finish_location_setting"))
            builder.row(types.InlineKeyboardButton(text="📞 Перейти к добавлению контактов", callback_data="contacts_menu"))
        else:
            builder.row(types.InlineKeyboardButton(text="✅ Завершить добавление", callback_data="finish_location_adding"))
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from handlers.general.user.user_class import User
        from handlers.seller.contacts.contacts_class import Contacts
        await state.clear()
        if call.data == "finish_location_setting":
            await User.buyer()
        else:
            await Contacts.contacts_menu(call, state)
