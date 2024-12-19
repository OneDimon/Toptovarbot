from aiogram import types


class Photo_verification_modules():
    async def photo_verification(message: types.Message, number_of_attempts: int = 0):
        if message.photo:
            await message.answer("Ваше фото успешно загружено!")
            return message.photo[-1].file_id
        else:
            if number_of_attempts > 10:
                await message.answer("Иди нафиг бот")
                return False
            else:
                await message.answer("Классное сообщение! Но лучше отправьте фото")
                return False