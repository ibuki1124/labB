-- usersテーブルにサンプルデータを挿入
INSERT INTO `users` (name, password, mail) VALUES
  ('user1', 'pass1', 'example1@example.com'),
  ('user2', 'pass2', 'example2@example.com'),
  ('user3', 'pass3', 'example3@example.com'),
  ('user4', 'pass4', 'example4@example.com'),
  ('user5', 'pass5', 'example5@example.com')
  ;
-- past_scoresテーブルにサンプルデータを挿入
INSERT INTO `past_scores` (score, date , user_id) VALUES
  (50, "2024/12/01 09:00" , 1),
  (40, "2024/12/02 09:00" , 5),
  (30, "2024/12/01 09:00" , 3),
  (20, "2024/12/05 09:00" , 5),
  (20, "2024/12/02 09:00" , 2),
  (60, "2024/12/03 09:00" , 3),
  (40, "2024/12/06 09:00" , 1),
  (50, "2024/12/12 09:00" , 5),
  (50, "2024/12/04 09:00" , 3)
  ;