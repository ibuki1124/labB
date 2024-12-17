<?php
?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>対策チェック-災害対策アプリ</title>
        <meta name="description" content="防災アプリ">
        <meta name="viewport" content="width=device-width, initial-sccale=1">
        <!--リセットCSS-->
            <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <!--オリジナルCSS-->
        <link rel="stylesheet" href="../css/style.css"> 
    </head>
    <body>
        <?php include("header.php"); ?>
        <main class="align-center">
            <div class="main">
                <h2 class="page-title">対策チェック</h2>
                <div class="right">
                    <a href="top.php">中断</a>
                </div>
            </div>
            <form class="check-form" action="" method="POST">
                <div class="main">
                    <h1 class="heading-medium">備蓄(食料)</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th>備蓄品</th><th>有無</th></tr>
                        </thead>
                        <tbody>
                        <!--繰り返しで表作成-->
                            <tr><td>品名</td><td><input class="green" type="checkbox" name="" value=""></input></td></tr>
                            <tr><td>2列目以降どうなるか見たいだけなので消していい</td><td><input class="green" type="checkbox" name="" value=""></input></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="main">
                    <h1 class="heading-medium">備蓄</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th>備蓄品</th><th>有無</th></tr>
                        </thead>
                        <tbody>
                            <!--繰り返しで表作成-->
                            <tr><td>品名</td><td><input class="green" type="checkbox" name="" value=""></input></td></tr>
                            <tr><td>2列目以降どうなるか見たいだけなので消していい</td><td><input class="green" type="checkbox" name="" value=""></input></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="main">
                    <h1 class="heading-medium">対策行動</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th>対策</th><th>有無</th></tr>
                        </thead>
                        <tbody>
                            <!--繰り返しで表作成-->
                            <tr><td>チェック項目</td><td><input class="green" type="checkbox" name="" value=""></input></td></tr>
                            <tr><td>2列目以降どうなるか見たいだけなので消していい</td><td><input class="green" type="checkbox" name="" value=""></input></td></tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn" type="submit" name="">続行</button>
            </form>
            </div>
        </main>
        <!--<footer class="page-footer">
            <h3 class="heading-midium">mail:b.uchidaken@gmail.com</h3>
        </footer>-->
    </body>
</html>