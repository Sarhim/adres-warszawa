<?php
function showLog(){
    if (!isset($_SESSION['success'])){
    echo('<div class="menu text">
    <p>Log-in</p>
    </div>');
    echo('<form method="post">
    <header class="header-big text">
    <p>
    Name: <input type="text" name="name">
    Password: <input type="password" name="pw">
    <input type="submit" name="log" value="Log-in"></p>
    </header>
    </form>');
  };
};

function showSuccessError(){
    if ( !isset($_SESSION['success']) ) {
    echo '<p class="simple-text">Please, log in to access data.</p>';
    };
    if ( isset($_SESSION['success']) ) {
    echo '<p class="simple-text">'.$_SESSION['name'].$_SESSION['success'].'</p>';
    };
    if ( isset($_SESSION['error']) ) {
    echo '<p class="simple-text">'.$_SESSION['error'].'</p>';
    unset($_SESSION['error']);
    };
};

function showTable($pdo, $show){
  $stmt = $pdo->query($show);
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
      echo('<table border="1" class="simple-text">');
      echo "<tr><td>";
      echo(htmlentities($row['name']));
      echo("</td><td>");
      echo(htmlentities($row['surname']));
      echo("</td><td>");
      echo(htmlentities($row['contact']));
      echo("</td><td>");
      echo(htmlentities($row['pw']));
      echo("</td><td>");
      echo('<a href="change-stat.php?customer_id='.$row['customer_id'].'&customer_stat='.$row['customer_stat'].'">');
      echo(htmlentities($row['customer_stat']));
      echo('</a>');
      echo("</td><td>");
      echo('<a href="edit-customer.php?customer_id='.$row['customer_id'].'">Edit</a> / ');
      echo('<a href="delete-cust.php?customer_id='.$row['customer_id'].'">Delete</a>');
      echo("</td></tr>\n");
      echo('</table>');
      echo('<p></p>');
      $custName = $row['name'];
      echo("<p>$custName's Messages:</p>");
      $custID = $row['customer_id'];

      $stmt2 = $pdo->query("SELECT * FROM message WHERE customer_id='.$custID.'");
      while ( $row = $stmt2->fetch(PDO::FETCH_ASSOC) ) {
          echo('<table border="1" class="simple-text">');
          echo "<tr><td>";
          echo(htmlentities($row['message_date']));
          echo("</td><td>");
          echo(htmlentities($row['message']));
          echo("</td><td>");
          echo('<a href="message-stat.php?customer_id='.$row['customer_id'].'&stat='.$row['stat'].'&message_id='.$row['message_id'].'">');
          echo(htmlentities($row['stat']));
          echo('</a>');
          echo("</td><td>");
          echo('<a href="edit-mess.php?message_id='.$row['message_id'].'">Edit</a> / ');
          echo('<a href="delete-mess.php?message_id='.$row['message_id'].'">Delete</a>');
          echo("</td></tr>\n");
      };
      echo('</table>');
      echo('<p></p>');
  };
  echo('<p><form method="post">
  <input type="submit" name="showActive" value="Active Customers Only">
  </form></p>');
  echo('<p><form method="post">
  <input type="submit" name="showAll" value="All Customers">
  </form></p>');
};

function showLogOut(){
  echo('<p><form method="post">
  <input type="submit" name="log-out" value="Log-out">
  </form></p>');
};
