<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['contact'])
     && isset($_POST['pw']) && isset($_POST['customer_id']) ) {


    $sql = "UPDATE customer SET name = :name, surname = :surname,
            contact = :contact, pw = :pw
            WHERE customer_id = :customer_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':surname' => $_POST['surname'],
        ':contact' => $_POST['contact'],
        ':pw' => $_POST['pw'],
        ':customer_id' => $_POST['customer_id']));
    header( 'Location: log.php' ) ;
    return;
}

$stmt = $pdo->prepare("SELECT * FROM customer WHERE customer_id = :customer_id");
$stmt->execute(array(":customer_id" => $_GET['customer_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$name = htmlentities($row['name']);
$surname = htmlentities($row['surname']);
$contact = htmlentities($row['contact']);
$pw = htmlentities($row['pw']);
$customer_id = $row['customer_id'];
?>

<!DOCTYPE html>
<html lang="ru" >
<head>
<meta charset="UTF-8">
<meta name="description" content="Надежный адрес в Варшаве для Вашей переписки">
<meta name="keywords" content="adres,Polska,korespondencja,wirtualne,biuro,Warszawa,адрес,Варшава,переписка,корреспонденция,poczta,почта">
<meta name="author" content="Jarosław H. Kulik">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Адрес-Варшава</title>
<link rel="icon" href="https://cdn3.iconfinder.com/data/icons/around-the-world/64/world_tourism_famous_place_sightseeing_21-512.png"/>
<link rel="stylesheet" href="final.v7.style.css">
</head>

<body>
<div class="main-text text main">
<p>Edit User</p>
<form method="post">
<p>Name:
<input type="text" name="name" value="<?= $name ?>"></p>
<p>Surname:
<input type="text" name="surname" value="<?= $surname ?>"></p>
<p>Contact:
<input type="text" name="contact" value="<?= $contact ?>"></p>
<p>Password:
<input type="text" name="pw" value="<?= $pw ?>"></p>
<input type="hidden" name="customer_id" value="<?= $customer_id ?>">
<p><input type="submit" value="Update"/>
<a href="log.php">Cancel</a></p>
</form>
</div>
</body>
</html>
