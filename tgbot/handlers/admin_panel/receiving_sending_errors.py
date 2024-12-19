from loader import bot


CHAT_ID = "-1002038051462"


async def error_accept(my_error, where_error):
    await bot.send_message(CHAT_ID, f"Произошла ошибка!\n"
                                    f"Ошибка: {my_error}\n"
                                    f"Локация: {where_error}")
