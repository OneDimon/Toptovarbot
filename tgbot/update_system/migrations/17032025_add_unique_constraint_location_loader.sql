-- Добавление уникального ограничения на USER_ID в таблице location_loader, если оно не существует
DO $$
BEGIN
    -- Проверяем, существует ли уже ограничение уникальности на столбце USER_ID таблицы location_loader
    IF NOT EXISTS (
        SELECT 1 
        FROM pg_constraint con
        JOIN pg_class rel ON rel.oid = con.conrelid
        JOIN pg_attribute att ON att.attrelid = rel.oid AND att.attnum = ANY(con.conkey)
        WHERE rel.relname = 'location_loader'
        AND att.attname = 'user_id'
        AND con.contype = 'u'
    ) THEN
        -- Если не существует, добавляем его с более специфичным именем
        ALTER TABLE location_loader ADD CONSTRAINT location_loader_user_id_unique UNIQUE (USER_ID);
    END IF;
END
$$; 