<?php
?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>結果-災害対策アプリ</title>
        <meta name="description" content="防災アプリ">
        <meta name="viewport" content="width=device-width, initial-sccale=1">

        <!--リセットCSS-->
            <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <!--オリジナルCSS-->
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/header.css">
    </head>
    <body>
        <?php
            session_start();
            include("temp/header.php");
        ?>
        <main class="align-center main">
            <div class="main">
                <h2 class="page-title">災害対策チェック結果</h2>
                <p class="">日付</p>
            </div>
                <div class="main-topc align-center">
                    <h1>スコア：〇</h1>
                </div>
                <table class="stocktable align-center">
                    <thead>
                        <tr><th>対策</th><th>結果</th></tr>
                    </thead>
                    <tbody>
                    <!--繰り返しで表作成-->
                    <tr><td>対策</td><td>〇×</td></tr>
                    </tbody>
                </table>
                <a href="top.php" class="btn"name="">トップ画面に戻る</a>
                
                
            </div>
        </main>
    </body>
</html>