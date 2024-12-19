<?php
?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>過去の記録-災害対策アプリ</title>
        <meta name="description" content="防災アプリ">
        <meta name="viewport" content="width=device-width, initial-sccale=1">

        <!--リセットCSS-->
            <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <!--オリジナルCSS-->
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/header.css">
    </head>
    <body>
        <?php include("header.php"); ?>
        <main class="align-center">
            <div class="main">
                <h2 class="page-title">過去の記録</h2>
            </div>
            <div class="main">
                <table class="stocktable align-center pastr">
                <thead>
                    <tr><th></th><th>日付</th></tr>
                    <tr><th>対策</th><th>結果</th></tr>
                </thead>
                <tbody>
                    <!--繰り返しで表作成-->
                    <tr><td>対策</td><td>〇×</td></tr>
                </tbody>
                </table>
            </div>
                <a href="top.php" class="btn"name="">トップ画面に戻る</a>
                
                
            </div>
        </main>
    </body>
</html>