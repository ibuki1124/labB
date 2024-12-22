-- usersテーブルを作成
CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(20) NOT NULL, -- ユーザ名
	`password` VARCHAR(8) NOT NULL, -- パスワード
	`mail` TEXT NOT NULL
);
-- genresテーブルを作成
CREATE TABLE `genres` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `genre` VARCHAR(50) NOT NULL -- チェック項目のジャンル
);
-- genresテーブルにはユーザ側の操作によるデータ挿入がないためここで挿入しておく（後から変更可能）
INSERT INTO `genres` (genre) VALUES
    ("備蓄（食料）"),
    ("備蓄（物）"),
    ("行動")
;
-- past_scoresテーブルを作成
CREATE TABLE `past_scores` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `score` INT NOT NULL, -- 過去のスコア
    `date` DATETIME NOT NULL, -- 日付
    `check_index` JSON NOT NULL, -- チェックした項目のidをjson形式で格納
    `user_id` INT NOT NULL, -- 外部キー
    -- `genre_id` INT NOT NULL, -- 外部キー
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
    -- FOREIGN KEY (`genre_id`) REFERENCES `genres`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- action_listsテーブルを作成
CREATE TABLE `action_lists` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `action` TEXT NOT NULL, -- 行動の内容
    `score` INT NOT NULL, -- 重要度
    `genre_id` INT NOT NULL, -- 外部キー
    FOREIGN KEY (`genre_id`) REFERENCES `genres`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
);
-- action_listsテーブルにはユーザ側の操作によるデータ挿入がないためここで挿入しておく（後から変更可能）
-- INSERT INTO action_lists (action, score, genre_id) VALUES
-- ('飲料水（一人一日3リットル目安、三日分）', 4, 1),
-- ('食料品：温めれば食べられるご飯（一人5食分を目安）', 4, 1),
-- ('備蓄用パン、ビスケット、板チョコ（最低一人3日分を目安）', 4, 1),
-- ('乳児がいる場合：ミルク', 1, 1),
-- ('乳児がいる場合：紙おむつ・哺乳瓶', 1, 2),
-- ('カセットコンロ', 4, 2),
-- ('非常用バッテリー', 4, 2),
-- ('LEDランタンなど照明・懐中電灯', 4, 2),
-- ('現金（小銭を中心に2万円ほど）', 4, 2),
-- ('救急用品：絆創膏・包帯・常備薬', 4, 2),
-- ('衛生用品：マスク・消毒用アルコール・ウェットティッシュ・体温計', 4, 2),
-- ('生理用品', 4, 2),
-- ('ヘルメット・防災頭巾・軍手・ヘッドランプ', 4, 2),
-- ('携帯ラジオ', 4, 2),
-- ('タオル', 4, 2),
-- ('防寒用アルミシート・カイロ', 4, 2),
-- ('安眠用具：耳栓・アイマスク', 4, 2),
-- ('衣類', 4, 2),
-- ('貴重品：預金通帳・印鑑', 4, 2),
-- ('医療関係備品：健康保険証・お薬手帳', 4, 2),
-- ('レインウェア', 4, 2),
-- ('文房具', 4, 2),
-- ('家具やテレビ、パソコンなどを固定し、転倒・落下・移動防止措置をしている。', 10, 3),
-- ('土嚢や水嚢を用意している。', 10, 3),
-- ('普段使用しない電気器具は、差込みプラグをコンセントから抜いている。', 10, 3),
-- ('家族で避難場所や避難経路を確認している。', 10, 3),
-- ('「水害（洪水）ハザードマップ」、「内水氾濫ハザードマップ」、「デジタル標高地形図（国土地理院）」「高潮ハザードマップ」「土砂災害ハザードマップ」を確認している。', 10, 3),
-- ('自分用の防災マップを作っている。', 10, 3),
-- ('近所と協力できる関係性がある。', 10, 3),
-- ('住宅用警報器が設置されている。', 10, 3)
-- ;