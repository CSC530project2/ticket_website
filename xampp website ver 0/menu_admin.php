
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
          <li><a href="####">View tickets</a></li>
          <li><a href="####">Update/edit tickets</a></li>
          <li><a href="####">Delete tickets</a></li>
          <li><a href="####">Configure users</a></li>
          <li><a href="####">LOG OUT</a></li>
        </ul>
    </div>
  </div>
   
</body>
</html>