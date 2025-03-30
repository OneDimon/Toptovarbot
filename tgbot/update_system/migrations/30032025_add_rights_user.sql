ALTER TABLE users ADD COLUMN rights text DEFAULT 'user' NOT NULL;
UPDATE users SET rights = 'admin' WHERE user_id = 641074145