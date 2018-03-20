<?php
    require_once "pdo.php";
    session_start();
    session_unset();
    header("Location: index.php");
    return;
?>
