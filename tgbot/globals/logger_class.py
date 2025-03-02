from aiogram import types
from loguru import logger

class CustomLogger:
    def __init__(self, log_file = 'log.txt') -> None:
        self.log_file = log_file

    async def loging_hanlder_errors(self, errorEvent: types.ErrorEvent) -> None:
        import json
        import pprint
        import traceback


        logger.add(self.log_file, format="{time} {level} {message}", level="ERROR", rotation="10 MB", compression="zip", backtrace=True, diagnose=True)

        logger.error(
            f"\n❌ Ошибка в обработчике Telegram!\n"
            f"update: {json.dumps(errorEvent.update.model_dump(), indent=4, ensure_ascii=False, default=str) if isinstance(errorEvent.update, types.Update) else pprint.pformat(errorEvent.update)}\n"
            f"Тип ошибки: {type(errorEvent.exception).__name__}\n"
            f"Сообщение: {str(errorEvent.exception)}\n"
            f"Стек вызова:\n{traceback.format_exc()}"
        )

    async def logging_info_user_action(self, user: types.User, text: str) -> None:
        from aiogram import types    
        import json 
        logger.add(self.log_file, format="{time} {level} {message}", level="INFO", rotation="10 MB", compression="zip", backtrace=True, diagnose=True)
        logger.info(
            f"Пользователь :{json.dumps(user.model_dump(), indent=4, ensure_ascii=False, default=str) if isinstance(user, types.User) else pprint.pformat(user)}"
        )
        logger.info(text)

    async def logging_system_info(self, text: str) -> None:
        logger.add(self.log_file, format="{time} {level} {message}", level="INFO", rotation="10 MB", compression="zip", backtrace=True, diagnose=True)
        logger.info(text)