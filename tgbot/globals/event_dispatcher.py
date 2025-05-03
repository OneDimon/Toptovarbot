# event_dispatcher.py
import asyncio
from collections import defaultdict
from typing import Callable, Awaitable, Dict, List

class AsyncEventDispatcher:
    def __init__(self):
        self._handlers: Dict[str, List[Callable[..., Awaitable[None]]]] = defaultdict(list)

    def subscribe(self, event_name: str, handler: Callable[..., Awaitable[None]]):
        self._handlers[event_name].append(handler)

    def unsubscribe(self, event_name: str, handler: Callable[..., Awaitable[None]]):
        if handler in self._handlers[event_name]:
            self._handlers[event_name].remove(handler)

    async def dispatch(self, event_name: str, *args, **kwargs):
        for handler in self._handlers.get(event_name, []):
            await handler(*args, **kwargs)

    def on_event(self, event_name: str):
        """
        Декоратор для регистрации асинхронной функции как обработчика события.
        """
        def decorator(func: Callable[..., Awaitable[None]]):
            self.subscribe(event_name, func)
            return func
        return decorator

# глобальный экземпляр
event_dispatcher = AsyncEventDispatcher()

# удобный алиас для декоратора
on_event = event_dispatcher.on_event
