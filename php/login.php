<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログインページ</title>
</head>
<body>
<div class="container">
    <form>
        <p class="fsize">災害対策アプリにログイン</p>
        <input type="text" placeholder="Username" name="username" />
        <input type="password" placeholder="Password" name="password" />
        <button type="button" onclick="location.href='login-success.php'">ログイン</button>
        <div class="create-links">
            <a href="create_account.php">アカウントがない方はこちらから登録してください</a>
        </div> 
    </form>
</div>
</body>
</html>