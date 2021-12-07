
<?php
session_start();
error_reporting(0);
$firstname= $_POST['username'];
$pass =$_POST['password'];

    $dbUsername ="root";
    $dbPassword="password";
    $dbname ="test";
    $conn = new mysqli('localhost',$dbUsername,'',$dbname);

    if(isset($firstname)||isset($pass))
    {
        $sql="select * from users where username='".$firstname."' AND password='".$pass."' limit 1";
        
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1)
        {
            $_SESSION["USER_SESSION"]=$firstname;
            header("Location:menu.php");
            
        }
        else{
            echo"bad password/username";
        }
    }

?>











<!DOCTYPE html>
<!--log in page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="StyleSheet2.css">


</head>
<body>
  
    <div class="main2">
        <form action ="" method="post">

        <img src="avatar.jpg" />
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Enter Username :)"/>
        <br />
        <label for="password">Passowrd:</label>
        <input type="password" name ="password" placeholder="Enter password :)"/>
        <input type="submit" name="submit"/>


        </form>
    </div>
   
</body>
</html>