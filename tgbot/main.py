import loader
import asyncio
import handlers


async def main():
    await loader.dp.start_polling(loader.bot)


if __name__ == '__main__':
    asyncio.run(main())
  