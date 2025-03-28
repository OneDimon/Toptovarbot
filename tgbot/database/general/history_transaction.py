from database import base


class HistoryTransactionDatabase(base.BaseDatabase):
    
    @staticmethod
    async def create_table():
        query = """CREATE TABLE IF NOT EXISTS history_transaction 
        (
            ID BIGSERIAL PRIMARY KEY NOT NULL,
            USER_ID BIGINT NOT NULL,
            AMOUNT DECIMAL(10, 2) NOT NULL,
            AMOUNT_RUB DECIMAL(10, 2) NOT NULL,
            TYPE VARCHAR(100) NOT NULL,
            DATE_TIME TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (USER_ID) REFERENCES users (USER_ID)
        )"""
        
        await HistoryTransactionDatabase.query_database(HistoryTransactionDatabase(), query)

    @staticmethod
    async def set_history_transaction(user_id: int, amount: float, type: str):
        query = f"""INSERT INTO history_transaction (USER_ID, AMOUNT, AMOUNT_RUB, TYPE) VALUES ({user_id}, {amount}, {amount * 200}, '{type}')"""
        await HistoryTransactionDatabase.query_database(HistoryTransactionDatabase(), query)

    @staticmethod
    async def get_history_transaction_from_user(user_id: int):
        query = f"""SELECT * FROM history_transaction WHERE USER_ID = {user_id} ORDER BY DATE_TIME DESC"""
        all_data = await HistoryTransactionDatabase.query_database(HistoryTransactionDatabase(), query)
        return all_data
