import sys
import os
sys.path.append(os.getcwd())
import psycopg2
from config_data.config import *
import importlib.util

DB_PARAMS = {
    "dbname": DATABASE,
    "user": USER,
    "password": PASSWORD,
    "host": HOST,
    "port": PORT
}

MIGRATIONS_DIR = "update_system/migrations"

def apply_sql_migration(cursor, filename):
    """Читает и выполняет SQL-файл"""
    with open(os.path.join(MIGRATIONS_DIR, filename), "r") as f:
        sql = f.read()
        print(f"Applying SQL migration: {filename}...")
        cursor.execute(sql)

def apply_python_migration(filename):
    """Импортирует и выполняет Python-скрипт"""
    filepath = os.path.join(MIGRATIONS_DIR, filename)
    spec = importlib.util.spec_from_file_location("migration_module", filepath)
    module = importlib.util.module_from_spec(spec)
    spec.loader.exec_module(module)

    if hasattr(module, "upgrade"):
        print(f"Applying Python migration: {filename}...")
        module.upgrade()
    else:
        print(f"Skipping {filename}: no `upgrade()` function found.")

def apply_migrations():
    conn = psycopg2.connect(**DB_PARAMS)
    cursor = conn.cursor()

    # Создаём таблицу для хранения применённых миграций, если её нет
    cursor.execute("""
        CREATE TABLE IF NOT EXISTS schema_migrations (
            id SERIAL PRIMARY KEY,
            filename TEXT UNIQUE NOT NULL,
            applied_at TIMESTAMP DEFAULT NOW()
        )
    """)
    conn.commit()

    # Получаем список уже применённых миграций
    cursor.execute("SELECT filename FROM schema_migrations")
    applied_migrations = {row[0] for row in cursor.fetchall()}

    # Применяем миграции
    for filename in sorted(os.listdir(MIGRATIONS_DIR)):
        if filename in applied_migrations:
            print(f"Skipping {filename}, already applied.")
            continue

        try:
            if filename.endswith(".sql"):
                apply_sql_migration(cursor, filename)
            elif filename.endswith(".py"):
                apply_python_migration(filename)
            else:
                print(f"Skipping {filename}: unknown format.")
                continue

            # Фиксируем изменения и записываем миграцию в БД
            cursor.execute("INSERT INTO schema_migrations (filename) VALUES (%s)", (filename,))
            conn.commit()

        except Exception as e:
            print(f"Error applying {filename}: {e}")
            conn.rollback()

    cursor.close()
    conn.close()
    print("All migrations applied successfully.")

if __name__ == "__main__":
    apply_migrations()