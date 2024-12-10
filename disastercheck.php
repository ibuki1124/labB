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
            <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="stripe">
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
                <h2 class="page-title">対策チェック</h2>
                <div class="right">
                    <a href="index.php">中断</a>
                </div>
            </div>
                <div class="main-top">
                    <h3>分野</h3><!--災害or備蓄。なくてもいいかも？-->
                    <h3>進捗/総数</h3>
                </div>
                <form class="check-form" action="" method="POST">
                    <?php/* if($  == ""){*/?><!--分野が備蓄(食料)の時-->
                        <div>
                            <h1 class="heading-medium">備蓄(食料)</h1>
                            <table class="stocktable align-center">
                                <tr><th>品名</th><th>有無</th><th>期限</th></tr>
                                <!--繰り返しで表作成-->
                                <tr><td>品名</td><td><input class="green" type="checkbox" name="" value=""></input></td><td><input class="" type="date" name="exp" value="null"></input></td></tr>
                                <tr><td>2列目以降どうなるか見たいだけなので消していい</td><td><input class="green" type="checkbox" name="" value=""></input></td><td><input class="" type="date" name="exp" value=""></input></td></tr>
                            </table>
                        </div>
                    <?php/* }elseif($  ==""){*/?><!--分野が他の対策の時-->
                    <div>
                    <h1 class="heading-medium">備蓄</h1>
                            <table class="stocktable align-center">
                                <tr><th>品名</th><th>有無</th><th>備考</th></tr>
                                <!--繰り返しで表作成-->
                                <tr><td>品名</td><td><input class="green" type="checkbox" name="" value=""></input></td><td><input class="" type="text" name="" placeholder="場所・数量等"></input></td></tr>
                                <tr><td>2列目以降どうなるか見たいだけなので消していい</td><td><input class="green" type="checkbox" name="" value=""></input></td><td><input type="text" class="" name="" placeholder="場所・数量等"></input></td></tr>
                            </table>
                    </div><?php/* }*/?>
                    <?php/* }elseif($  ==""){*/?><!--分野が他の対策の時-->
                    <div>
                        <h1 class="heading-medium">チェック項目</h1>
                        <p>細かな説明あれば</p>
                        <div class="radiobtn heading-medium">
                            対策済<input class="green" type="radio" name="radio" value="true"></input><br>
                            未対策<input class="green" type="radio" name="radio" value="false"></input>
                        </div>
                    </div><?php/* }*/?>
                    <button class="btn" type="submit" name="">続行</button>
                </form>
            </div>
        </main>
        <!--<footer class="page-footer">
            <h3 class="heading-midium">mail:b.uchidaken@gmail.com</h3>
        </footer>-->
    </body>
</html>