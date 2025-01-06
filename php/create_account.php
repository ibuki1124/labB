<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../img/アンケートシートのフリー素材.png" >
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="../css/create_account.css">
  <link rel="stylesheet" href="../css/header.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>アカウント作成ページ</title>
</head>
<body>
<?php
  session_start();
  if (!empty($_SESSION["user_name"])){ // ログイン済みの場合
    header("Location:top.php");
    exit;
  }
  include("temp/header.php");
?>
<div class="container">
    <form action="login.php" method="post">
        <p class="fsize">アカウントの作成</p>
        <input type="text" placeholder="Username (20 characters max)" name="username" maxlength="20" />
        <input type="email" placeholder="Mail" name="mail" />
        <input type="password" placeholder="Password (8 characters max)" name="password" maxlength="8" />
        <button type="submit" name="sign_up">登録</button>
    </form>
</div>
</body>
</html>