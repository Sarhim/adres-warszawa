<?php
require_once "pdo.php";
session_start();

if ($_GET['stat'] == "waiting"){
$sql = "UPDATE message SET stat = :stat
        WHERE customer_id = :customer_id
        AND message_id = :message_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':customer_id' => $_GET['customer_id'],
    ':message_id' => $_GET['message_id'],
    ':stat' => "done"));
header( 'Location: log.php' ) ;
return;
};

if ($_GET['stat'] == "done"){
$sql = "UPDATE message SET stat = :stat
        WHERE customer_id = :customer_id
        AND message_id = :message_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':customer_id' => $_GET['customer_id'],
    ':message_id' => $_GET['message_id'],
    ':stat' => "waiting"));
header( 'Location: log.php' ) ;
return;
};

?>
