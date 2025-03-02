import psycopg2
import csv
from config_data.config import *

class CreaterBackupReferral:

    def create_backup(self):
        import datetime
        today = datetime.today().strftime("%Y-%m-%d")
        table_name = "referral"
        backup_file = f"backups/referral/{today}_referral_backup.csv"

        connection = psycopg2.connect(user=USER,
                                        password=PASSWORD,
                                        host=HOST,
                                        port=PORT,
                                        database=DATABASE)
        cursor = connection.cursor()

        # Получаем все данные, кроме `id`, так как он автоинкрементный
        cursor.execute(f"SELECT user_id, link, referrer_id, points, group_points, sop, status, last_status, balance, potential_status FROM {table_name}")
        rows = cursor.fetchall()

        # Получаем названия колонок (без id)
        columns = [desc[0] for desc in cursor.description]

        # Сохраняем в CSV
        with open(backup_file, "w", newline="", encoding="utf-8") as f:
            writer = csv.writer(f)
            writer.writerow(columns)
            writer.writerows(rows)

        connection.close()
        print(f"Данные из {table_name} сохранены в {backup_file}")

    def rebuild_referral(self):
        import datetime
        today = datetime.today().strftime("%Y-%m-%d")
        table_name = "referral"
        backup_file = f"backups/referral/{today}_referral_backup.csv"

        connection = psycopg2.connect(user=USER,
                                        password=PASSWORD,
                                        host=HOST,
                                        port=PORT,
                                        database=DATABASE)
        cursor = connection.cursor()
        with open(backup_file, "r", encoding="utf-8") as f:
            reader = csv.reader(f)
            columns = next(reader)  # Заголовки
            data = [tuple(row) for row in reader]

        # Очистка таблицы перед вставкой (если нужно)
        cursor.execute(f"DELETE FROM {table_name}")

        # Вставка без id (он генерируется автоматически)
        placeholders = ", ".join(["%s"] * len(columns))
        query = f"INSERT INTO {table_name} ({', '.join(columns)}) VALUES ({placeholders})"
        cursor.executemany(query, data)

        connection.commit()
        connection.close()
        print(f"Таблица {table_name} восстановлена из {backup_file}")
