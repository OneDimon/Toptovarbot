import os
import sys
import asyncio
import traceback
from loguru import logger
import loader
import handlers
from aiogram import types
from aiogram import types, Router

# Логирование в файл
logger.add('logs/error_logs/bot_errors.log', format="{time} | {level} | {message}", level="DEBUG", rotation="10 MB", compression="zip", backtrace=True, diagnose=True)

# Глобальный обработчик исключений
def exception_handler(exc_type, exc_value, exc_traceback):
    logger.error(
        f"\n⚠ Необработанное исключение!\n"
        f"Тип ошибки: {exc_type.__name__}\n"
        f"Сообщение: {exc_value}\n"
        f"Стек вызова:\n{''.join(traceback.format_tb(exc_traceback))}"
    )

sys.excepthook = exception_handler

async def main():
    script_directory = os.path.dirname(os.path.abspath(__file__))
    os.chdir(script_directory)
    await loader.dp.start_polling(loader.bot)

if __name__ == '__main__':
    try:
        asyncio.run(main())
    except Exception as e:
        logger.exception("Ошибка в asyncio.run(main())")
