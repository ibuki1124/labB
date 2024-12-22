<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/mypage.css">
    <link rel="stylesheet" href="../css/header.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>マイページ</title>    
</head>
<body>
    <?php
        session_start();
        include("temp/db.php");
        if (empty($_SESSION["user_name"])){ // ログインしていない場合
            header("Location:login.php");
            exit;
        }
    ?>
    <?php include("temp/header.php"); ?>
    <div class="container">
        <h1>マイページ</h1>
        
        <!-- 現在の情報表示 -->
        <section class="current-info">
            <h2>現在のアカウント情報</h2>
            <p><strong>メールアドレス:</strong> <?= $_SESSION["mail"] ?></p>
            <p><strong>パスワード:</strong> <?= $_SESSION["password"] ?></p>
        </section>

        <!-- 変更フォーム -->
        <section class="update-form">
            <h2>アカウント情報の変更</h2>
            <form method="post" action="/update-account">
                <!-- メールアドレスの変更 -->
                <label for="new-email">新しいメールアドレス:</label>
                <input type="email" id="new-email" name="new-email" placeholder="新しいメールアドレスを入力" required>

                <!-- パスワードの変更 -->
                <label for="new-password">新しいパスワード:</label>
                <input type="password" id="new-password" name="new-password" placeholder="新しいパスワードを入力（8文字以内）" maxlength="8" required>

                <!-- 更新ボタン -->
                <button type="submit">更新する</button>
            </form>
        </section>
    </div>
</body>
</html>
