DELETE FROM referral 
WHERE id NOT IN (
    SELECT MIN(id) FROM referral GROUP BY user_id
);
ALTER TABLE referral ADD CONSTRAINT unique_user_id UNIQUE (user_id);
