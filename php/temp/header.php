<?php ?>
<div>
    <header class="page-header">
        <div class="aplication_title align-center">
            <a href="top.php"><img src="../img/アンケートシートのフリー素材.png">
            災害対策アプリ</a>
        </div>
        <nav class="nav-links">
            <?php
                if (empty($_SESSION["user_name"])){
                    echo '<a href="create_account.php">アカウント作成へ</a>';
                    echo '<a href="login.php">ログインページへ</a>';
                }else{
                    echo '<a href="mypage.php">マイページへ</a>';
                    echo '<a href="pastresults.php">過去の結果へ</a>';
                    echo '<a href="logout.php">ログアウト</a>';
                }
            ?>
        </nav>
    </header>
</div>
