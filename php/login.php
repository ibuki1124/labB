<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/header.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>ログインページ</title>
</head>
<body>
<?php
    session_start();
    include("temp/db.php");
    if (!empty($_SESSION["user_name"])){ // ログイン済みの場合
        header("Location:top.php");
        exit;
    }else{
        $_SESSION = array(); //セッションの中身をすべて削除
        session_destroy(); //セッションを破棄
    }
    if (isset($_POST["sign_up"])){ // アカウント作成ページからの遷移
        if (isset($_POST["username"], $_POST["mail"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["mail"])){
            $user_name = $_POST["username"];
            $mail = $_POST["mail"];
            $password = $_POST["password"];
            // 以下sql
            $sql = 'SELECT * FROM users where name=:name'; // 同じ名前の人がいるか
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $user_name, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if (empty($results)){ // 同じ名前の人がいないとき
                $sql = "INSERT INTO users (name, password, mail) VALUES (:name, :password, :mail)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $user_name, PDO::PARAM_STR);
                $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->execute();
                $_SESSION["user_name"] = $user_name;
            }else{ // 同じ名前の人がいた時
                if (isset($_POST["sign_up"])){
                    header("Location:create_account.php");
                    exit;
                }else{
                    $_SESSION["user_name"] = $user_name;
                }
            }
        }else{ // 入力が不十分な時
            header("Location:create_account.php");
        }
    }
    include("temp/header.php");
?>
<div class="container">
    <form action="login-success.php" method="post">
        <p class="fsize">災害対策アプリにログイン</p>
        <input type="text" placeholder="Username" name="username" />
        <input type="password" placeholder="Password" name="password" />
        <button type="submit" name="login">ログイン</button>
        <div class="create-links">
            <a href="create_account.php">アカウントがない方はこちらから登録してください</a>
        </div> 
    </form>
</div>
</body>
</html>