<?php
  require __DIR__ . '/../../vendor/autoload.php';
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
  $dotenv->load();
  $db = "mysql:dbname={$_ENV['DBNAME']};host={$_ENV['HOST']}";
  $user = $_ENV["USER"];
  $pass = $_ENV["PASS"];
  $pdo = new PDO($db, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

  // 表示されているか確認したい場合にコメントアウト外す
  // $sql = "SELECT * FROM action_lists";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute();
  // $results = $stmt->fetchAll();
  // foreach ($results as $row){
  //   echo $row["action"]."<br>";
  // }
?>