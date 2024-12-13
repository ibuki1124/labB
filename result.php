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
            <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="cover-home">
        <header class="page-header">
            <h1 class="align-center">災害対策アプリ</h1>
            <nav>
            <ul class="main-nav">
                <li><a href="">マイページ</a></li>
            </ul>
            </nav>        
        </header>
    </div>
        <main class="align-center">
            <div class="main">
                <h2 class="page-title">災害対策チェック結果</h2>
                <p class="">日付</p>
            </div>
                <div class="main-topc align-center">
                    <h1>スコア：〇</h1>
                </div>
                <table class="stocktable align-center">
                    <thead>
                        <tr><th>対策</th><th>結果</th><th>備考</th></tr>
                    </thead>
                    <tbody>
                    <!--繰り返しで表作成-->
                    <tr><td>対策</td><td>〇×</td><td>期限とか</td></tr>
                    </tbody>
                </table>
                <a href="index.php" class="btn"name="">トップ画面に戻る</a>
                
                
            </div>
        </main>
    </body>
</html>