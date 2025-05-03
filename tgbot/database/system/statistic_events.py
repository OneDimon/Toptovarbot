from database import base
import json


class StatisticEventsDatabase(base.BaseDatabase):

    @staticmethod
    async def add_event(user_id: int, event: str, metadata: dict = {}) -> None:
        query = """INSERT INTO statistic_events (USER_ID, EVENT_TYPE, META) VALUES (%s, %s, %s)"""
        await StatisticEventsDatabase.query_database(StatisticEventsDatabase(), query, user_id, event, json.dumps(metadata, indent=4, ensure_ascii=False))