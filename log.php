<?php
require_once "pdo.php";
require_once "util.php";
session_start();
//$salt='XyZzy12*_';

if (isset($_POST['name']) && isset($_POST['pw'])){
  $stmt = $pdo->prepare("SELECT * FROM admin WHERE name = :name");
  $stmt->execute(array(":name" => $_POST['name']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
//    if (hash('md5', $salt.$_POST['pw']) == $row['pw']){
    if ($_POST['pw'] == $row['pw']){
      $_SESSION['success'] = ', you are logged in!';
      $_SESSION['name'] = $_POST['name'];
      $_SESSION['show'] = "SELECT * FROM customer;";
      header('Location: log.php');
      return;
    } else {
      $_SESSION['error'] = 'Password is incorrect!';
      header('Location: log.php');
      return;
    };
};

if (isset($_POST['log-out'])){
      header('Location: log-out.php');
      return;
};

if (isset($_POST['showActive'])){
      $_SESSION['show'] = "SELECT * FROM customer WHERE customer_stat = 'active';";
      header('Location: log.php');
      return;
};

if (isset($_POST['showAll'])){
      $_SESSION['show'] = "SELECT * FROM customer;";
      header('Location: log.php');
      return;
};

if (isset($_POST['log'])){
    if (!isset($_POST['name'])){
      $_SESSION['error'] = 'Please, insert name!';
      header('Location: log.php');
      return;
    };
};
?>

<html lang="ru" >
<head>
<meta charset="UTF-8">
<meta name="description" content="Надежный адрес в Варшаве для Вашей переписки">
<meta name="keywords" content="adres,Polska,korespondencja,wirtualne,biuro,Warszawa,адрес,Варшава,переписка,корреспонденция,poczta,почта">
<meta name="author" content="Jarosław H. Kulik">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Адрес-Варшава</title>
<link rel="icon" href="https://cdn3.iconfinder.com/data/icons/around-the-world/64/world_tourism_famous_place_sightseeing_21-512.png"/>
<link rel="stylesheet" href="final.v10.style.css">
</head>

<body>
<?php
showLog();
?>
<div class="main-text text main">
<h1>User Data</h1>
<?php
showSuccessError();
?>
<?php
if (isset($_SESSION['success'])){
  $show = $_SESSION['show'];
  showTable($pdo, $show);
  showLogOut();
};
?>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="final.v2.index.js"></script>
</body>
</html>
