from aiogram import Bot
from aiogram.types import BotCommand, BotCommandScopeDefault


async def set_bot_commands(bot: Bot):
    commands = [
        BotCommand(
            command='start',
            description='Основное меню'
        ),
        BotCommand(
            command='help',
            description='Помощь'
        )
    ]

    await bot.set_my_commands(commands, BotCommandScopeDefault())


async def set_bot_commands_seller(bot: Bot):
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
            command='help',
            description='Помощь'
        )
    ]

    await bot.set_my_commands(commands, BotCommandScopeDefault())


async def set_bot_commands_buyer(bot: Bot):
    commands = [
        BotCommand(
            command='start',
            description='Основное меню'
        ),
        BotCommand(
            command='buyer_menu',
            description='Меню покупателя'
        ),
        BotCommand(
            command='help',
            description='Помощь'
        )
    ]

    await bot.set_my_commands(commands, BotCommandScopeDefault())
