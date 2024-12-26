from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.users import Users_database as DB_users
from database.location import Location_database as DB_location
from states.states import location as StateLocation
from handlers.base_handler_class import Base_hanler, Steps_base
from modules.photo_verification_modules import Photo_verification_modules
from aiogram.types import FSInputFile


class Location (Base_hanler):
    @staticmethod
    async def if_location(user_id : int) -> bool:
        location_data = await DB_location.get_location(user_id)
        if location_data:
            return True
        else:
            return False
        
    @staticmethod
    async def get_location(user_id : int) -> list:
        return await DB_location.get_location(user_id)
        
    @staticmethod
    async def back_location(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        data_state['ar_func_location'].pop()
        func = data_state['ar_func_location'][-1]
        await func(call, state)

class Location_name(Steps_base):
    def __init__(self, id_location_in_db: int = None):
        self.id_location_in_db = id_location_in_db
        name = 'name'
        module = 'location'
        super().__init__(name, module)

    async def _before_start_of_step(self, call: types.CallbackQuery, state: FSMContext):       
        state_data = await state.get_data()
        if 'init_location' in state_data and state_data['init_location'] == True:
            return
        else:
            state_data['location_name'] = ''
            state_data['location_sector'] = ''
            state_data['location_building'] = ''
            state_data['location_floar'] = ''
            state_data['location_line'] = ''
            state_data['location_place'] = ''
            state_data['location_address'] = ''
            state_data['location_photo'] = ''
            state_data['init_location'] = True
            state_data['number_of_attempts'] = 0
            if self.id_location_in_db:
                state_data['id_location_in_db'] = self.id_location_in_db
            await state.update_data(state_data)

    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return 'Ваша торговая точка ' + data_state[self.key_data_in_state] + ', выберите один из вариантов или оставьте текущий'
        else:
            return 'Где находится ваша торговая точка?'
        
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="р-к Садовод", callback_data="р-к Садовод")
        )
        builder.row(types.InlineKeyboardButton(
            text="ТЯК Москва", callback_data="ТЯК Москва")
        )
        builder.row(types.InlineKeyboardButton(
            text="р-к Южные Ворота", callback_data="р-к Южные ворота")
        )
        builder.row(types.InlineKeyboardButton(
            text="Свой вариант", callback_data="Свой вариант")
        )
        builder.row(types.InlineKeyboardButton(
            text="Поставщик из Китая", callback_data="Поставщие из китая")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="main_menu") 
        )
        return builder
    
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        call_data = call.data
        if call_data == "current":
            data_state = await state.get_data()
            call_data = data_state[self.key_data_in_state]
        match call_data:
            case "р-к Садовод" :
                await Location_sector().start_of_step(call, state)
            case "ТЯК Москва" :
                await Location_building().start_of_step(call, state)
            case "р-к Южные ворота" :
                await Location_building().start_of_step(call, state)
            case "Свой вариант" :
                await Location_address().start_of_step(call, state)
            case "Поставщие из китая":
                await Location_address().start_of_step(call, state)
        
class Location_sector(Steps_base):
    def __init__(self):
        name = 'sector'
        module = 'location'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "Вы выбрали р-к " + data_state[self.key_data_in_state] + "\n" + "Укажите в каком секторе располагается Ваша торговая точка." + "\n" + "Или оставьте текущий" 
        else:
            return "Вы выбрали р-к Садовод\n" + "Укажите в каком секторе располагается Ваша торговая точка."
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Крытый вещевой рынок", callback_data="Крытый вещевой рынок")
        )
        builder.row(types.InlineKeyboardButton(
            text="Торговый комплекс", callback_data="Торговый комплекс")
        )
        builder.row(types.InlineKeyboardButton(
            text="Строение", callback_data="Строение")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_location")
        )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        call_data = call.data
        if call_data == "current":
            data_state = await state.get_data()
            call_data = data_state[self.key_data_in_state]
        match call_data:
            case "Крытый вещевой рынок" :
                await Location_line().start_of_step(call, state)
            case "Торговый комплекс" :
                await Location_building().start_of_step(call, state)
            case "Строение" :
                await Location_building().start_of_step(call, state)
        
class Location_address(Steps_base):
    def __init__(self):
        name = 'address'
        module = 'location'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели, " + data_state[self.key_data_in_state] + "\n" + "Введите адресс или оставьте текущий." 
        else:
            return "Введите адресс."
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Пропустить", callback_data="skip")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_location")
        )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await Location_building().start_of_step(call, state)
        
class Location_building(Steps_base):
    def __init__(self):
        name = 'building'
        module = 'location'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели/выбрали, " + data_state[self.key_data_in_state] + "\n" + "Введите/выберите корпус или оставьте текущий." 
        else:
            return "Введите/выберите корпус."
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Пропустить", callback_data="skip")
        )
        builder.row(types.InlineKeyboardButton(
            text="Основной ТК", callback_data="Основной ТК")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_location")
        )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await Location_floar().start_of_step(call, state)

class Location_floar(Steps_base):
    def __init__(self):
        name = 'floar'
        module = 'location'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели, " + data_state[self.key_data_in_state] + "\n" + "Введите этаж или оставьте текущий." 
        else:
            return "Этаж?"
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Пропустить", callback_data="skip")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_location")
        )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await Location_line().start_of_step(call, state)

class Location_line(Steps_base):
    def __init__(self):
        name = 'line'
        module = 'location'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели, " + data_state[self.key_data_in_state] + "\n" + "Введите ряд или оставьте текущий." 
        else:
            return "Ряд?"
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Пропустить", callback_data="skip")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_location")
        )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await Location_place().start_of_step(call, state)


class Location_place(Steps_base):
    def __init__(self):
        name = 'place'
        module = 'location'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели, " + data_state[self.key_data_in_state] + "\n" + "Введите место или оставьте текущее." 
        else:
            return "Место?"
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Пропустить", callback_data="skip")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_location")
        )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await Location_photo().start_of_step(call, state)

class Location_place(Steps_base):
    def __init__(self):
        name = 'place'
        module = 'location'
        super().__init__(name, module)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            return "вы ввели, " + data_state[self.key_data_in_state] + "\n" + "Введите место или оставьте текущее." 
        else:
            return "Место?"
    
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Пропустить", callback_data="skip")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_location")
        )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await Location_photo().start_of_step(call, state)

class Location_photo(Steps_base):
    def __init__(self):
        name = 'photo'
        module = 'location'
        super().__init__(name, module)

    async def _before_get_answer(self, call: types.CallbackQuery | types.Message, state: FSMContext):
        data_state = await state.get_data()
        if type(call) == types.CallbackQuery:
            return
        
        photo_id = await Photo_verification_modules.photo_verification(call, data_state['number_of_attempts'])

        if photo_id:
            data_state['location_photo_id'] = photo_id
            await state.update_data(data_state)
            return
        else:
            return True
    
    async def _save_answer_data(self, call: types.CallbackQuery | types.Message, state: FSMContext):
       data_state = await state.get_data()
       if 'location_photo_id' not in data_state:
           return
       await call.bot.download(data_state['location_photo_id'], F"img/{data_state['location_photo_id']}.jpg")
       data_state[self.key_data_in_state] = F"img/{data_state['location_photo_id']}.jpg"
       await state.update_data(data_state)
    
    async def _get_text_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> str:
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            photo = FSInputFile(data_state[self.key_data_in_state])
            await call.bot.send_photo(call.from_user.id, photo)
            return "вы отправили данную фотографию, " "\n" + "Отпрвьте новую фотграфию или оставьте текущую." 
        else:
            return f"Отправьте фотографию вашего торгового места \n ОБЯЗАТЕЛЬНО, чтобы четко было видно ряд и место над ТТ"
            
    async def _get_builder_inline_keyboard_for_question(self, call: types.CallbackQuery|types.Message, state: FSMContext) -> InlineKeyboardBuilder:
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Пропустить", callback_data="skip")
        )
        data_state = await state.get_data()
        if self.key_data_in_state in data_state and data_state[self.key_data_in_state]:
            builder.row(types.InlineKeyboardButton(
                text="Оставить текущее", callback_data="current")
            )
        builder.row(types.InlineKeyboardButton(
            text="Назад", callback_data="back_location")
        )
        return builder

    async def _after_get_answer(self, call: types.CallbackQuery, state: FSMContext):
        data_state = await state.get_data()
        if 'id_location_in_db' in data_state and data_state['id_location_in_db']:
            await DB_location.update_location(data_state['id_location_in_db'],
                                              data_state['location_name'],
                                              data_state['location_sector'],
                                              data_state['location_building'],
                                              data_state['location_floar'],
                                              data_state['location_line'],
                                              data_state['location_place'],
                                              data_state['location_address'],
                                              data_state['location_photo'])
        else:
            await DB_location.add_location(call.from_user.id, 
                                           data_state['location_name'],
                                           data_state['location_sector'],
                                           data_state['location_building'],
                                           data_state['location_floar'],
                                           data_state['location_line'],
                                           data_state['location_place'],
                                           data_state['location_address'],
                                           data_state['location_photo'])
            
    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        await location_description().start_of_step(call, state)

class location_description(Steps_base):
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
            message_id = await Base_hanler.mssage_answer(call, text, builder.as_markup())
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
            builder.row(types.InlineKeyboardButton(
                text="Завершить редактирование", callback_data="finish_location_setting")
            )
            builder.row(types.InlineKeyboardButton(
                text="Перейти к добавлению контактов", callback_data="contacts_menu")
            )
        else:
            builder.row(types.InlineKeyboardButton(
                text="Завершить добавление", callback_data="finish_location_adding")
            )
        return builder

    async def _go_to_next_step(self, call: types.CallbackQuery, state: FSMContext):
        from handlers.user.user_class import User
        from handlers.contacts.contacts_class import Contacts
        await state.clear()
        if call.data == "finish_location_setting":
            await User.buyer()
        else:
            await Contacts.contacts_menu(call, state)
