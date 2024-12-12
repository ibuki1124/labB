-- usersテーブルを作成
CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(20) NOT NULL,
	`password` VARCHAR(8) NOT NULL,
	`mail` TEXT NOT NULL
);
-- past_scoresテーブルを作成
CREATE TABLE `past_scores` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `score` INT NOT NULL, -- 過去のスコア
    `date` DATETIME NOT NULL, -- 日付
    `user_id` INT NOT NULL, -- 外部キー
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- genreテーブルを作成
CREATE TABLE `genres` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `genre` VARCHAR(50) NOT NULL -- チェック項目のジャンル
);
-- genresテーブルにはユーザ側の操作によるデータ挿入がないためここで挿入しておく（後から変更可能）
INSERT INTO `genres` (genre) VALUES
    ("備蓄"),
    ("行動")
;
-- action_listテーブルを作成
CREATE TABLE `action_lists` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `action` TEXT NOT NULL, -- 行動の内容
    `genre_id` INT NOT NULL, -- 外部キー
    FOREIGN KEY (`genre_id`) REFERENCES `genres`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);