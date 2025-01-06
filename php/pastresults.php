<?php
?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>過去の記録-災害対策アプリ</title>
        <meta name="description" content="防災アプリ">
        <meta name="viewport" content="width=device-width, initial-sccale=1">
        <link rel="icon" type="image/png" href="../img/アンケートシートのフリー素材.png" >

        <!--リセットCSS-->
            <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <!--オリジナルCSS-->
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/header.css">
    </head>
    <body>
        <?php
            session_start();
            if (empty($_SESSION["user_name"])){ // ログインしていない場合
                header("Location:login.php");
                exit;
            }
            $user_id = $_SESSION["user_id"];

            include("temp/db.php");
            $sql = "SELECT date, check_index, user_id FROM past_scores WHERE user_id = :user_id ORDER BY date DESC;";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll();
        
            $sql = "SELECT id, action FROM action_lists";
            $stmt = $pdo -> prepare($sql);
            $stmt->execute();
            $actions = $stmt->fetchAll();
        ?>
        <?php include("temp/header.php"); ?>
        <main class="align-center">
            <div class="main">
                <h2 class="page-title">過去の記録</h2>
            </div>
            <div class="main">
            <div class="accordion">
                <?php foreach ($results as $r): 
                    $check_indexes = json_decode($r['check_index'], true) ?? [];
                ?>
                <div class="accordion-item">
                    <div class="accordion-header" data-target="content<?= $r['date'] ?>"><?= $r['date'] ?><div class="left">スコア: </div></div>
                    <div class="accordion-content" id="content<?= $r['date'] ?>">
                        <table class="stocktable align-center pastr">
                            <thead>
                                <tr><th>対策</th><th>結果</th></tr>
                            </thead>
                            <tbody>
                                <?php foreach ($actions as $a): ?>
                                    <tr>
                                        <td><?= $a['action'] ?></td>
                                        <td><?= in_array($a['id'], $check_indexes) ? '〇' : '×' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <a href="top.php" class="btn"name="">トップ画面に戻る</a>
        </main>
        <script>
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const targetId = header.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const isActive = content.classList.contains('active');

                document.querySelectorAll('.accordion-content').forEach(c => c.classList.remove('active'));
                document.querySelectorAll('.accordion-header').forEach(h => h.classList.remove('active'));

                if (!isActive) {
                    content.classList.add('active');
                    header.classList.add('active');
                }
            });
        });
    </script>
    </body>
</html>