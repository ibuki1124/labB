<?php
?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>対策のポイント-災害対策アプリ</title>
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
            $sql = "SELECT measure_lists.measure,m_genres.genre FROM measure_lists,m_genres WHERE measure_lists.genre_id=m_genres.id";
            $stmt = $pdo->prepare($sql);
            $stmt -> execute();
            $measure = $stmt -> fetchAll(PDO::FETCH_ASSOC);

            // データをジャンルごとに整理
            $groupedMeasures = [];
            foreach ($measure as $m) {
                $groupedMeasures[$m['genre']][] = $m['measure'];
            }
            //一番上だけ開くためのフラグ
            $first = true;
        ?>
        <?php include("temp/header.php"); ?>
        <main class="align-center">
            <h2 class="page-title">対策のポイント</h2>
            <?php foreach ($groupedMeasures as $genre => $measures): ?>
            <?php $id = "list-" . md5($genre); ?>
            <div class="listbox">
                <h2 class="genre-title" onclick="toggleList('<?= $id ?>')">            <!-- タイトルをクリックで開閉 -->
                    <?= $genre ?>
                    <span class="toggle-icon" id="icon-<?= $id ?>">
                        <?= $first ? '−' : '+' ?>
                    </span>
                </h2>
                <ul id="<?= $id ?>" class="measure-list <?= $first ? 'first' : '' ?>">
                    <?php foreach ($measures as $measure): ?>
                    <li class="left"><?=$measure ?></li>
                    <?php endforeach; ?>
                </ul>
                <br><hr>
            </div>
            <?php $first = false; // 2回目以降は閉じる ?>
            <?php endforeach; ?>
            <a href="top.php" class="btn"name="">トップ画面に戻る</a>
        </main>
    <script>
        function toggleList(id) {
        var element = document.getElementById(id);
        var icon = document.getElementById("icon-" + id);
    
        if (element.style.display === "none" || element.style.display === "") {
            element.style.display = "block"; // 開く
            icon.textContent = "−"; // マイナス表示
        } else {
            element.style.display = "none";  // 閉じる
            icon.textContent = "+"; // プラス表示
        }
        }
    </script>
    </body>
</html>