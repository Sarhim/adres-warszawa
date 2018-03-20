<?php
require_once "pdo.php";
session_start();

if ($_GET['customer_stat'] == "active"){
$sql = "UPDATE customer SET customer_stat = :customer_stat
        WHERE customer_id = :customer_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':customer_id' => $_GET['customer_id'],
    ':customer_stat' => "not-active"));
header( 'Location: log.php' ) ;
return;
};

if ($_GET['customer_stat'] == "not-active"){
$sql = "UPDATE customer SET customer_stat = :customer_stat
        WHERE customer_id = :customer_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':customer_id' => $_GET['customer_id'],
    ':customer_stat' => "active"));
header( 'Location: log.php' ) ;
return;
};

?>
