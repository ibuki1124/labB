<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login-success.css">
  <link rel="stylesheet" href="../css/header.css">
  <title>ログイン成功</title>
</head>
<body>
<?php include("temp/header.php"); ?>
  <?php
    session_start();
    include("temp/db.php");
    if (isset($_POST["login"])){ // ログインページからの遷移
        if (isset($_POST["username"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])){
            $user_name = $_POST["username"];
            $password = $_POST["password"];
            // 以下sql
            $sql = 'SELECT * FROM users where name=:name and password=:password'; // 名前とパスワードが一致するか
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $user_name, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if (!empty($results)){ // 名前とパスワードが一致した時
              foreach ($results as $row){
                $_SESSION["user_name"] = $row["name"];
                $_SESSION["mail"] = $row["mail"];
                $_SESSION["password"] = $row["password"];
              }
            }else{ // 名前とパスワードが一致しなかった時
              header("Location:login.php");
              exit;
            }
        }else{ // 入力が不十分な時
            header("Location:login.php");
        }
    }else{ // ログインページからの遷移でない時
        header("Location:login.php");
        exit;
    }
  ?>
  <h1>ログイン成功</h1>
  <div class="container">
    <a href="top.php" class="button">トップページへ</a>
    <a href="mypage.php" class="button">マイページへ</a>
  </div>
</body>

</html>