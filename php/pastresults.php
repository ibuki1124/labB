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
            <?php foreach ($results as $r): ?>
                <table class="stocktable align-center pastr">
                <thead>
                    <tr><th></th><th>日付：<?= $r['date'] ?></th></tr>
                    <tr><th>対策</th><th>結果</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($actions as $a): ?>
                        <tr><td><?= $a['action'] ?></td>
                        <td>
                            <?php if (in_array($a['id'], json_decode($r['check_index'], true))): ?>〇
                            <?php else: ?>×
                            <?php endif; ?>
                        </td></tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            <?php endforeach; ?>
            </div>
                <a href="top.php" class="btn"name="">トップ画面に戻る</a>
                
                
            </div>
        </main>
    </body>
</html>