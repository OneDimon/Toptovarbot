-- Migration: 29052025_create_delivery_order_table.sql
-- Модуль заявок на отгрузку (курьерская логика грузчика)

CREATE TABLE IF NOT EXISTS delivery_order (
    ID              BIGSERIAL PRIMARY KEY NOT NULL,
    BUYER_ID        BIGINT NOT NULL,
    LOADER_ID       BIGINT,
    SELLER_ID       BIGINT,
    DESCRIPTION     TEXT NOT NULL,
    ADDRESS_FROM    VARCHAR(500) NOT NULL,
    ADDRESS_TO      VARCHAR(500) NOT NULL,
    STATUS          VARCHAR(50) NOT NULL DEFAULT 'new',
    -- Статусы: new | taken | in_progress | done | cancelled
    PHOTO_DONE      TEXT,
    COMMENT_DONE    TEXT,
    CREATED_AT      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TAKEN_AT        TIMESTAMP,
    IN_PROGRESS_AT  TIMESTAMP,
    DONE_AT         TIMESTAMP,
    FOREIGN KEY (BUYER_ID)  REFERENCES users (USER_ID),
    FOREIGN KEY (LOADER_ID) REFERENCES users (USER_ID),
    FOREIGN KEY (SELLER_ID) REFERENCES users (USER_ID)
);

-- Индексы для быстрого поиска открытых заявок и заявок грузчика
CREATE INDEX IF NOT EXISTS idx_delivery_order_status    ON delivery_order (STATUS);
CREATE INDEX IF NOT EXISTS idx_delivery_order_loader_id ON delivery_order (LOADER_ID);
CREATE INDEX IF NOT EXISTS idx_delivery_order_buyer_id  ON delivery_order (BUYER_ID);
