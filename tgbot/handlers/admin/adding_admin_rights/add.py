from aiogram import types
from handlers.base_handler_class import StepsBase
from aiogram.fsm.context import FSMContext
from database.general.users import UsersDatabase as DB_users

class Add(StepsBase):
    def __init__(self):
        name = 'add'
        module = 'adding_admin_rights'
        super().__init__(name, module)

    async def _get_text_for_question(self, call, state):
        return 'Введите id пользователя, которому хотите дать права администратора'
    
    async def _before_get_answer(self, mess : types.Message, state : FSMContext):
        user = await DB_users.get_user_from_user_id(mess.text)
        if not user:
            await mess.answer(text='Пользователь не найден', show_alert=True)
            return True
        
    async def _save_answer_data(self, mess : types.Message, state: FSMContext):
        await DB_users.set_property(mess.text, 'rights', 'admin')
        return await super()._save_answer_data(mess, state)
    
    async def _after_get_answer(self, call, state):
        await self.message_answer(call, 'админ добавлен')
    


    
        
    
    