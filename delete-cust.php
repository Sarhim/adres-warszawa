<?php
require_once "pdo.php";
session_start();

$sql = "DELETE FROM customer WHERE customer_id = :customer_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':customer_id' => $_GET['customer_id']));
header( 'Location: log.php' ) ;
return;
