import loader
import asyncio
import handlers
import os


async def main():
    script_directory = os.path.dirname(os.path.abspath(__file__))
    os.chdir(script_directory)
    await loader.dp.start_polling(loader.bot)


if __name__ == '__main__':
    asyncio.run(main())
  