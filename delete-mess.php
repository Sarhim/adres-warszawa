<?php
require_once "pdo.php";
session_start();

$sql = "DELETE FROM message WHERE message_id = :message_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':message_id' => $_GET['message_id']));
header( 'Location: log.php' ) ;
return;
