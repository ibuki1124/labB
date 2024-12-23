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
            $user_id = $_SESSION["user_id"];

            include("temp/db.php");
            $sql = "SELECT * FROM past_scores WHERE user_id = :user_id ORDER BY date DESC LIMIT 1;";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $latest_result = $stmt->fetch();
        
            $sql = "SELECT id, action FROM action_lists";
            $stmt = $pdo -> prepare($sql);
            $stmt->execute();
            $actions = $stmt->fetchAll();

            include("temp/header.php");
        ?>
        <main class="align-center main">
            <?php if (!empty($latest_result)): ?>
                <div class="main">
                    <h2 class="page-title">災害対策チェック結果</h2>
                    <p class="">日付：<?= $latest_result['date']; ?></p>
                </div>
                <div class="main-topc align-center">
                    <h1>スコア：<?= $latest_result['score']; ?></h1>
                </div>
                <table class="stocktable align-center">
                    <thead>
                        <tr><th>対策</th><th>結果</th></tr>
                    </thead>
                    <tbody>
                    <?php foreach ($actions as $a): ?>
                        <tr><td><?= $a['action'] ?></td>
                        <td>
                            <?php if (in_array($a['id'], json_decode($latest_result['check_index'], true))): ?>〇
                            <?php else: ?>×
                            <?php endif; ?>
                        </td></tr>
                    <?php endforeach; ?>    
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
            <a href="top.php" class="btn"name="">トップ画面に戻る</a>
        </main>
    </body>
</html>