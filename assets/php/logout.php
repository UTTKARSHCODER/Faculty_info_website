<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: /project/root/index.php');
    exit();
?>