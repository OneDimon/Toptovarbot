from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.general.users import UsersDatabase as DB_users
from database.seller.organization import OrganizationDatabase as DB_organization
from states.states import Organization as StateOrganization
from handlers.base_handler_class import BaseHandler, StepsBase
from modules.photo_verification_modules import PhotoVerificationModules
from aiogram.types import FSInputFile


class Organization (StepsBase):

    @staticmethod
    async def if_organization(user_id : int) -> bool:
        organization_data = await DB_organization.get_organization(user_id)
        return len(organization_data) > 0
    def __init__(self):
        name = 'organization'
        module = 'organization'
        super().__init__(name, module)

    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):
        from handlers.general.user.user_class import User
        user = await User._search_user(call.from_user.id)
        state_data = await state.get_data()
        state_data['organization_organization'] = user['organization']
        await state.update_data(state_data)

    async def _get_text_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> str:
        state_data = await state.get_data()
        if self.key_data_in_state in state_data and state_data[self.key_data_in_state]:
            return "Ваша организация, " + state_data[self.key_data_in_state] + "\n" + "Введите название организации или оставьте текущее."
        else:
            return "Организация?"
        
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery | types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        state_data = await state.get_data()
        builder = InlineKeyboardBuilder()
        if self.key_data_in_state in state_data and state_data[self.key_data_in_state]: 
            builder.row(types.InlineKeyboardButton(text="💾 Оставить текущее", callback_data="current"))
        else: 
            builder.row(types.InlineKeyboardButton(text="⏭️ Пропустить", callback_data="skip"))
        return builder
    
    async def _after_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        state_data = await state.get_data()
        if type(call) == types.Message:
            await DB_organization.add_organization(call.from_user.id, state_data[self.key_data_in_state])
            await self.message_answer(call, 'Организация успешно добавлена/обновлоена')
        elif not (self.key_data_in_state in state_data and state_data[self.key_data_in_state]):
            await DB_organization.add_organization(call.from_user.id, 'Не указано')
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from handlers.general.user.user_class import User
        await User.seller(call, state)