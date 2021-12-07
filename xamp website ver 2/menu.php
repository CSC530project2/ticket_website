<?php
  session_start();


?>








<!DOCTYPE html>
<!--log in page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="#">


</head>
<body>
  <div class="main">
   <label for="account_name">HI <?php echo $_SESSION['USER_SESSION']?></label>
    <div class="nav-links">
        <ul>
          <li><a href="newticket.php">submit a ticket</a></li>
       
          <li><a href="logout.php">LOG OUT<?php session_destroy(); ?></a></li>
        </ul>
    </div>
  </div>
   
</body>
</html>