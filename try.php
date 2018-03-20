<?php
require_once "pdo.php";
session_start();

if (isset($_POST['ElementChange'])){

  $sql = "UPDATE html_elements SET element = :element
          WHERE element_id = :element_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
      ':element' => $_POST['newElement'],
      ':element_id' => $_POST['oldElementID']));
  header( 'Location: try.php' ) ;
  return;

};

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
<link rel="stylesheet" href="final.v8.style.css">
</head>

<body>
<div class="main-text text main">
<?php
$stmt = $pdo->query("SELECT * FROM html_elements WHERE page_id = 1");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo($row['element']);
    echo('<p><form method="post"><input type="text" name="newElement" value="'.$row['element'].'">
        <input type="hidden" name="oldElementID" value="'.$row['element_id'].'">
        <input type="submit" name="ElementChange" value="Change"></form></p>');
};
?>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="final.v2.index.js"></script>
</body>
</html>
