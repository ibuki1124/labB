<?php //ログアウト処理
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location:login.php");
    exit;
?>