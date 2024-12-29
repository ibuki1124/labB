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
        <?php
            session_start();

            if (empty($_SESSION["user_name"])){
                header("Location:login.php");
                exit;
            }
                include("temp/db.php");
                $sql = "SELECT * FROM action_lists WHERE genre_id =1;";
                $stmt = $pdo->prepare($sql);
                $stmt -> execute();
                $foods = $stmt -> fetchAll();

                $sql = "SELECT * FROM action_lists WHERE genre_id =2;";
                $stmt = $pdo->prepare($sql);
                $stmt -> execute();
                $things = $stmt -> fetchAll();

                $sql = "SELECT * FROM action_lists WHERE genre_id =3;";
                $stmt = $pdo->prepare($sql);
                $stmt -> execute();
                $act = $stmt -> fetchAll();

                // チェックした項目を配列に格納
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // チェックされた項目を取得
                    $checkedItems = $_POST['actions'] ?? []; // チェックされたIDの配列
                    $userId = $_SESSION["user_id"]; // ログインユーザーID
                    $date = date('Y-m-d H:i:s'); // 現在の日時

                    if (!empty($checkedItems)) {
                        // 取得したデータを確認
                        // foreach ($checkedItems as $itemId) {
                        //     echo "Checked Item ID: " . htmlspecialchars($itemId) . "<br>";
                        // }
                        $checkedItemsJson = json_encode($checkedItems);

                        // var_dump($checkedItems); // 配列の内容を確認
                        // echo $checkedItemsJson;   // カンマ区切り文字列を確認

                        try {
                            //スコア集計
                            $placeholders = rtrim(str_repeat('?,', count($checkedItems)), ',');
                            $sql = "SELECT SUM(score) AS total_score FROM action_lists WHERE id IN ($placeholders)";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute($checkedItems);
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $score = $result['total_score'] ?? 0; // 合計スコア（該当がなければ0）

                            //結果保存
                            $sql = "INSERT INTO past_scores (score, date, check_index, user_id) 
                                    VALUES (:score, :date, :check_index, :user_id)";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':score', $score, PDO::PARAM_INT);
                            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                            $stmt->bindParam(':check_index', $checkedItemsJson, PDO::PARAM_STR);
                            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
                            $stmt->execute();
                
                            // echo "チェックリストを保存しました。";
                        } catch (PDOException $e) {
                            // echo "エラー: " . $e->getMessage();
                        }
                    } /*else {
                        echo "チェックされた項目がありません。";
                    } */
                }



            include("temp/header.php");
        ?>
        <main class="">
            <h2 class="page-title">対策チェック</h2>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress"></div>
                </div>
                <p class="progress-text" id="progress-text">0.0%</p>
            </div>
            <form class="check-form align-center" action="" method="POST">
                <div>
                    <h1 class="heading-medium">備蓄(食料)</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th rowspan="2">備蓄品</th><th colspan="2">有無</th></tr>
                            <tr><th>済</th><th>未</th></tr>
                        </thead>
                        <tbody>
                        <!--繰り返しで表作成-->
                            <!-- <tr><td>品名</td><td><input class="checkbox" type="checkbox"></input></td></tr>-->
                            <?php
                            $no = 0;
                            foreach ($foods as $f):?>
                                <tr><td><?= $f['action'] ?></td><td><input class="radio" type="radio" name="f_<?= $no ?>" value="<?= $f['id'] ?>"></input></td><td><input class="radio" type="radio" name="f_<?= $no ?>" value="<?= $f['id'] ?>"></input></td></tr>
                            <?php 
                            $no++;
                            endforeach; ?>
                            </tbody>
                    </table>
                </div>
                <div>
                    <h1 class="heading-medium">備蓄</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th rowspan="2">備蓄品</th><th colspan="2">有無</th></tr>
                            <tr><th>済</th><th>未</th></tr>
                        </thead>
                        <tbody>
                            <!--繰り返しで表作成-->
                            <!-- <tr><td>品名</td><td><input class="checkbox" type="checkbox" name="" value=""></input></td></tr> -->
                            <?php
                            $no = 0;
                            foreach ($things as $t): ?>
                                <tr><td><?= $t['action'] ?></td><td><input class="radio" type="radio" name="t_<?= $no ?>" value="<?= $t['id'] ?>"></input></td><td><input class="radio" type="radio" name="t_<?= $no ?>" value="<?= $t['id'] ?>"></input></td></tr>
                            <?php
                            $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h1 class="heading-medium">対策行動</h1>
                    <table class="stocktable align-center">
                        <thead>
                            <tr><th rowspan="2">備蓄品</th><th colspan="2">有無</th></tr>
                            <tr><th>済</th><th>未</th></tr>
                        </thead>
                        <tbody>
                            <!--繰り返しで表作成-->
                            <!-- <tr><td>チェック項目</td><td><input class="checkbox" type="checkbox" name="" value=""></input></td></tr> -->
                            <?php
                            $no = 0;
                            foreach ($act as $a): ?>
                                <tr><td><?= $a['action'] ?></td><td><input class="radio" type="radio" name="a_<?= $no ?>" value="<?= $a['id'] ?>"></input></td><td><input class="radio" type="radio" name="a_<?= $no ?>" value="<?= $a['id'] ?>"></input></tr>
                            <?php
                            $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn " type="submit" name="">続行</button>
            </form>
            </div>
        </main>
        <!--<footer class="page-footer">
            <h3 class="heading-midium">mail:b.uchidaken@gmail.com</h3>
        </footer>-->

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const radiobtn = document.querySelectorAll(".radio");
                const progressBar = document.querySelector(".progress");
                const progressText = document.getElementById("progress-text");

                function updateProgress() {
                    const total = radiobtn.length / 2 ; // 総数
                    const checked = document.querySelectorAll(".radio:checked").length; // チェックされた数
                    const percentage = ((checked / total) * 100).toFixed(1); // 進捗率

                    // 進捗バー更新
                    progressBar.style.width = `${percentage}%`;
                    progressText.textContent = `${percentage}%`;

                }
                radiobtn.forEach((radio) => {
                    radio.addEventListener("change", updateProgress);
                });
                    
                updateProgress();// 初期表示の更新
                
            });

        </script>
    </body>
</html>