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
        <link rel="stylesheet" href="../css/header.css">
    </head>
    <body>
        <?php include("header.php"); ?>
        <main>
            <h2 class="page-title">対策チェック</h2>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress"></div>
                </div>
                <p class="progress-text" id="progress-text">0.0%</p>
            </div>
            <form class="check-form" action="" method="POST">
                <div>
                    <h1 class="heading-medium">備蓄(食料)</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th>備蓄品</th><th>有無</th></tr>
                        </thead>
                        <tbody>
                        <!--繰り返しで表作成-->
                            <tr><td>品名</td><td><input class="checkbox" type="checkbox"></input></td></tr>
                            <tr><td>2列目以降どうなるか見たいだけなので消していい</td><td><input class="green" type="checkbox" name="" value=""></input></td></tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h1 class="heading-medium">備蓄</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th>備蓄品</th><th>有無</th></tr>
                        </thead>
                        <tbody>
                            <!--繰り返しで表作成-->
                            <tr><td>品名</td><td><input class="checkbox" type="checkbox" name="" value=""></input></td></tr>
                            <tr><td>2列目以降どうなるか見たいだけなので消していい</td><td><input class="green" type="checkbox" name="" value=""></input></td></tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h1 class="heading-medium">対策行動</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th>対策</th><th>有無</th></tr>
                        </thead>
                        <tbody>
                            <!--繰り返しで表作成-->
                            <tr><td>チェック項目</td><td><input class="checkbox" type="checkbox" name="" value=""></input></td></tr>
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

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const checkboxes = document.querySelectorAll(".checkbox");
                const progressBar = document.querySelector(".progress");
                const progressText = document.getElementById("progress-text");

                function updateProgress() {
                    const total = checkboxes.length; // 総数
                    const checked = document.querySelectorAll(".checkbox:checked").length; // チェックされた数
                    const percentage = ((checked / total) * 100).toFixed(1); // 進捗率

                    // 進捗バー更新
                    progressBar.style.width = `${percentage}%`;
                    progressText.textContent = `${percentage}%`;

                }
                checkboxes.forEach((checkbox) => {
                    checkbox.addEventListener("change", updateProgress);
                });
                    
                updateProgress();// 初期表示の更新
                
            });

        </script>
    </body>
</html>