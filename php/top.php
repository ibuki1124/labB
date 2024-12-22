<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/top.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>災害対策アプリ</title>
</head>
<body>
    <?php
        session_start();
        include("temp/header.php");
    ?>

    <h1 class="aplication_name">災害対策アプリ</h1>

    <div class="container">
        <a href="disastercheck.php" class="button">対策チェックへ</a>
        <!-- <a href="#actions" class="button">災害時の行動(リスト、災害別)へ</a> -->
    </div>
</body>
</html>