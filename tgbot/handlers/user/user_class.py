from states.states import StateUser
from aiogram.filters.command import Command
from aiogram import types
from aiogram.utils.keyboard import InlineKeyboardBuilder
from aiogram.fsm.context import FSMContext
from database.users import Users_database as DB_users
from database.referral_program import Referral_database as DB_referral
from handlers.location.location_class import Location, Location_name
from handlers.base_handler_class import Base_hanler
from config_data.config import *
from aiogram import types
from aiogram.types import BotCommand, BotCommandScopeDefault
from aiogram import Bot



class User (Base_hanler):
    @staticmethod
    async def start(start : types.Message, state : FSMContext):
        await state.clear()
        userData = await User._search_user(start.from_user.id)
        await User.__get_bot_command(start.bot)
        if not userData:
            await User.__add_user(start, state)
        elif userData[8] == False:
            await User._get_offerta(start, state)
        elif userData[9] == None or userData[9] == '' or  userData[9] == 'None':
            await User._get_t_phone(start, state)
        else:
            await User.__response_main_menu(start)
 
    @staticmethod
    async def start_callback(call : types.CallbackQuery, state : FSMContext):
        await state.clear()
        userData = await User._search_user(call.from_user.id)
        await User.__get_bot_command(call.bot)
        if userData[8] == False:
            await User._get_offerta(call, state)
        elif userData[9] == None:
            await User._get_t_phone(call, state)
        else:
            await User.__response_main_menu(call)

    @staticmethod
    async def main_menu(start : types.CallbackQuery, state : FSMContext):
        await state.clear()
        await User.__get_bot_command(start.bot)
        await User.__response_main_menu(start)

    @staticmethod
    async def seller(seller : types.CallbackQuery|types.Message, state : FSMContext):
        from handlers.contacts import contacts_class
        from handlers.organization import organization_class
        await state.clear()
        if_location = await Location.if_location(seller.from_user.id)
        if_contact = await contacts_class.Contacts.if_contacts(seller.from_user.id)
        if_organization = await organization_class.Organization.if_organization(seller.from_user.id)
        if not if_location:
            await Location_name().start_of_step(seller, state)
            return
        elif not if_contact:
            await contacts_class.Contacts().contacts_menu(seller, state)
            return
        elif not if_organization:
            await organization_class.Organization().start_of_step(seller, state)
            return
        else:
            keyboard = await User.__get_seller_menu()
            await User.mssage_answer(seller, "Вы вошли как Продавец!", keyboard)
            return

    @staticmethod
    async def buyer(call : types.CallbackQuery, state : FSMContext):
        await state.clear()
        userData = await User._search_user(call.from_user.id)
        if not userData[2]:
            await User.get_city_states(call, state)
        else:
            buyer_keyboard = await User.__get_buyer_menu()
            await User.mssage_answer(call, "Вы вошли как Покупатель!", buyer_keyboard)

    @staticmethod
    async def profile(call : types.CallbackQuery, state : FSMContext):
        from handlers.contacts import contacts_class
        from handlers.location.location_class import Location
        userData = await User._search_user(call.from_user.id)  
        contacts_all = await contacts_class.Contacts.get_all_contacts(call.from_user.id)    
        Location_data = await Location.get_location(call.from_user.id)    
        text_profile = await User.__get_text_profile(userData, contacts_all, Location_data[0])   
        inline_builder = await User.__get_inline_keyboard_profile()        
        await User.mssage_answer(call, text_profile, inline_builder)

    @staticmethod
    async def get_city_states(call : types.CallbackQuery, state : FSMContext):
        await state.set_state(StateUser.register_buyer_get_city)
        await User.mssage_answer(call, "Из какого вы города?")

    @staticmethod
    async def get_city_confirm(call : types.CallbackQuery, state : FSMContext):
        data_state = await state.get_data()
        await DB_users.set_user_city(call.from_user.id, data_state["city"])
        buyer_keyboard = await User.__get_buyer_menu()
        await User.mssage_answer(call, "Вы вошли как Покупатель!", buyer_keyboard)

    @staticmethod
    async def set_user_city(message : types.Message, state : FSMContext):
        await state.set_state(StateUser.register_buyer_get_city_process)
        await state.set_data({"city" : message.text})
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Правильно", callback_data="get_city_confirm")
        )
        builder.row(types.InlineKeyboardButton(
            text="назад", callback_data="get_city_cancel")
        )
        state_data = await state.get_data()
        await User.mssage_answer(message, "Вы из города " + state_data["city"] + "?", builder.as_markup())
    
    @staticmethod
    async def confirm_offerta(call : types.CallbackQuery, state : FSMContext):
        await DB_users.set_user_offerta(call.from_user.id, True)
        await User.start_callback(call, state)
 
    @staticmethod
    async def set_t_phone(message : types.Message, state : FSMContext):
        await DB_users.set_t_phone(message.from_user.id, message.contact.phone_number)
        await User.mssage_answer(message, "Ваш контакт добавлен", reply_markup=types.ReplyKeyboardRemove())
        await User.start(message, state)

    @staticmethod
    async def get_contacts_helpers(call : types.CallbackQuery, state : FSMContext):
        text = ("Нужна помощь? Свяжитесь с нами одним из спсобов:\n"
                "Telegram - @testTelegram\n"
                "WhatsApp - @testWhatsap\n"
                "почта - test@yandex.ru")
        await call.answer(text)

    @staticmethod
    async def _search_user(user_id : int):
        user_data = await DB_users.get_user_from_user_id(user_id)
        if not user_data:
            return False
        return user_data[0]
    
    @staticmethod
    async def about_bot(call : types.CallbackQuery):
        text = ("⏳ Успей присоединиться к революционной системе! 👥🌟\n"
                "🔒 Количество мест ограничено.\n"
                "Последующие подписки на @OptTovarBot платные.\n\n"

                "💡 Наш бот - это самый короткий путь между\n"
                "оптовыми продавцами и покупателями. 🚀\n\n"

                "⏱️ Это сотни часов ⏳ и тысячи средств 💰💰,сэкономленных на поисках"
                " товаров для покупателей или\n"
                "рекламе товаров для продавцов.\n\n"

                "📚 Бот - это база-каталог с новинками в канале, прямыми контактами и возможностью "
                "в несколько кликов:\n\n"

                "🔎 Для покупателя:\n"
                "💬 Выдаст вам контакты и местоположение оптовых продавцов с ценой и наличием товара "
                "на данный момент\n"
                "по нажатию кнопки\n"
                '"Онлайн запрос продавцам" 💲\n'
                "🔍 Выдаст возможных продавцов искомого товара по запрашиваемой категории. 🛍️\n\n"

                "💼 Для продавцов:\n"
                "📢 Отрекламирует ваши товары и новинки в стержневом канале, "
                "и вы получите массу онлайн запросов на товары\n"
                "или обращений через ваши контакты конкретно по вашим категориям товаров. 💪\n\n"

                "🎯 Успей получить доступ к нашему боту и упростить свои оптовые сделки! 🤝💼\n")
        
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="В меню продавца", callback_data="seller")
        )
        builder.row(types.InlineKeyboardButton(
            text="В меню покупателя", callback_data="buyer")
        )
        builder.row(types.InlineKeyboardButton(
            text='В главное меню', callback_data='main_menu')
        )
        await User.mssage_answer(call, text, builder.as_markup())

    @staticmethod
    async def _if_subscribshed(user_id : int):
        from datetime import datetime
        cur_date = datetime.now()  # уже является datetime.datetime
        data_user = await User._search_user(user_id)
        data_user_date = datetime.min if data_user[5] is None else datetime.combine(data_user[5], datetime.min.time())
        return (bool(data_user[3]) and (data_user_date > cur_date))
    @staticmethod
    async def _add_subscribtion(user_id : int, date):
        await DB_users.add_subscription(user_id, date)
        
    @staticmethod
    async def __add_user(start : types.Message, state : FSMContext):
        if " " in start.text:
            referer_id = start.text.split()[1]
        if not ('referer_id' in locals()):
            if (start.from_user.id == 641074145):
                referer_id = 1
            else:
                referer_id = 641074145
        referral_link = LINK_BOT + "?start=" + str(referer_id)
        await DB_users.add_user(start.from_user.id, start.from_user.full_name)
        await DB_referral.add_referral(start.from_user.id, referral_link, referer_id)
        await User.start(start, state)

    @staticmethod
    async def _get_offerta(start : types.Message, state : FSMContext):
        text = "Продолжая пользоваться вы соглашаетесь с <b><a href='https://vk.com/@kotovskiy-otzyv'>пользовательским соглашением</a></b> и <b>политикой конфиденциальности</b>."
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Согласен с условиями пользотельского соглашения", callback_data="confirm_offerta")
        )
        if type(start) == types.CallbackQuery:
            await start.message.answer(text, reply_markup=builder.as_markup())
        else:
            await start.answer(text, reply_markup=builder.as_markup())

    @staticmethod
    async def _get_t_phone(start : types.Message|types.CallbackQuery, state : FSMContext):
        text = 'Нажмите на кнопку, чтоб отправить контакт'

        keyboard = [
            [types.KeyboardButton(text="📱 Отправить", request_contact=True)],
            [types.KeyboardButton(text="Назад")]
        ]
        markup = types.ReplyKeyboardMarkup(keyboard=keyboard, resize_keyboard=True)
        await User.mssage_answer(start, text, markup)
            
    @staticmethod
    async def __response_main_menu(start : types.Message|types.CallbackQuery):
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Продавец", callback_data="seller")
        )
        builder.row(types.InlineKeyboardButton(
            text="Покупатель", callback_data="buyer")
        )
        await User.mssage_answer(start, "Вы вошли как <b>Продавец</b> или <b>Покупатель</b>?", builder.as_markup())


    @staticmethod
    async def __get_seller_menu():
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="📺 Посмотреть канал", url="https://t.me/optovi4ekchannel")
        )
        builder.add(types.InlineKeyboardButton(
            text="👥 Профиль", callback_data="profile")
        )
        builder.row(types.InlineKeyboardButton(
            text="🤖 О боте", callback_data="about_bot")
        )
        builder.add(types.InlineKeyboardButton(
            text="💬 Чат", url="https://t.me/+iWuEszVObmw2ZmRi")
        )
        builder.row(types.InlineKeyboardButton(
            text="📞 Контакты поддержки", callback_data="contacts_supports") 
        )
        builder.add(types.InlineKeyboardButton(
            text="📈 Оформить подписку", callback_data="subscription_menu")
        )
        builder.row(types.InlineKeyboardButton(
            text="📦 Опубликовать Ваши товары (новинки)", callback_data="publication_product")
        )
        builder.row(types.InlineKeyboardButton(
            text="👫 Реферальная программа", callback_data="referral_program")
        )
        builder.row(types.InlineKeyboardButton(text="💸 перейти к пополнению баланса", callback_data="balance_menu"))
        builder.row(types.InlineKeyboardButton(
            text="🔙 Основное меню", callback_data="main_menu")
        )
        return builder.as_markup()

    @staticmethod
    async def __get_buyer_menu():
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="📊 Опросить продавцов онлайн", callback_data="seller_survey")
        )
        builder.row(types.InlineKeyboardButton(
            text="📰 Новинки в канале",
            url="https://t.me/optovi4ekchannel")
        )
        builder.add(types.InlineKeyboardButton(
            text="👥 Продавцы по категориям", callback_data="categories_search")
        )
        builder.row(types.InlineKeyboardButton(
            text="🤖 О боте", callback_data="about_bot")
        )
        builder.add(types.InlineKeyboardButton(
            text="📈 Оформить подписку", callback_data="subscription_menu")
        )
        builder.add(types.InlineKeyboardButton(
            text="📞 Контакты поддержки", callback_data="contacts_supports") 
        )
        builder.row(types.InlineKeyboardButton(
            text="👫 Реферальная программа", callback_data="referral_program")
        )
        builder.row(types.InlineKeyboardButton(text="💸 перейти к пополнению баланса", callback_data="balance_menu"))
        builder.row(types.InlineKeyboardButton(
            text="🔙 Назад", callback_data="main_menu") 
        )
        return builder.as_markup()
            
    @staticmethod
    async def __get_text_profile(userData, contacts_all, Location_data):
        text_contacts = await User.__get_text_contacts(contacts_all)
        text_organization = await User.__get_text_organization(userData)
        text_location = await User.__get_text_location(Location_data)

        text_all = f"{text_organization} \n \n \n {text_contacts}\n \n Местоположение: \n {text_location}"

        return text_all

    @staticmethod
    async def __get_text_contacts(all_contacts):
        telegram = ''
        whatsapp_link = ''
        admin_vk_link = ''
        if 'telegram' in all_contacts and all_contacts['telegram']:
            for contact_telegram in all_contacts['telegram']:
                telegram += ' ' + contact_telegram['contact']

        if 'whatsapplink' in all_contacts and all_contacts['whatsapplink']:
            for contact_whatsapp_link in all_contacts['whatsapplink']:
                whatsapp_link += ' ' + contact_whatsapp_link['contact']

        if 'admin_vk_link' in all_contacts and all_contacts['admin_vk_link']:
            for contact_phone in all_contacts['admin_vk_link']:
                admin_vk_link += ' ' + contact_phone['contact']

        return f"Телеграм: {telegram} \n WhatsAppLink: {whatsapp_link} \n ссылка на админ страницу вк: {admin_vk_link}"
    
    @staticmethod
    async def __get_text_organization(userData):
        return f"Организация: {userData[6]}"
    
    @staticmethod
    async def __get_text_location(Location_data):
        text = ''
        for i in range(2, len(Location_data)):
            if Location_data[i]:
                match i:
                    case 4:
                        text += f'корпус: {Location_data[i]} '
                    case 5:
                        text += f'этаж: {Location_data[i]} '
                    case 6:
                        text += f'ряд: {Location_data[i]} '
                    case 7:
                        text += f'место: {Location_data[i]} '
                    case 9:
                        text += ''
                    case _:
                        text += f'{Location_data[i]} '
        return text

    @staticmethod
    async def __get_inline_keyboard_profile():
        builder = InlineKeyboardBuilder()
        builder.row(types.InlineKeyboardButton(
            text="Организация", callback_data="organization")
        )
        builder.row(types.InlineKeyboardButton(
            text="Контактные данные", callback_data="contacts_menu") 
        )
        builder.row(types.InlineKeyboardButton(
            text="Место", callback_data="location")
        )
        builder.row(types.InlineKeyboardButton(
            text="Назад в меню", callback_data="seller")
        )
        builder.row()
        return builder.as_markup()

    @staticmethod
    async def __get_bot_command(bot: Bot):
        return
        commands = [
            BotCommand(
                command='start',
                description='Основное меню'
            ),
            BotCommand(
                command='seller_menu',
                description='Меню продавца'
            ),
            BotCommand(
                command='buyer_menu',
                description='Меню покупаетеля'
            ),
        ]
        await bot.set_my_commands(commands, BotCommandScopeDefault())