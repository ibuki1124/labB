-- 外部キー制約を一時無効化
SET FOREIGN_KEY_CHECKS = 0;
-- 各テーブルをtruncate（データを削除し、idを1から振りなおす）
TRUNCATE TABLE users;
TRUNCATE TABLE past_scores;
TRUNCATE TABLE genres;
TRUNCATE TABLE action_lists;
TRUNCATE TABLE measure_lists;
TRUNCATE TABLE m_genres;
-- 外部キー制約を有効化
SET FOREIGN_KEY_CHECKS = 1;