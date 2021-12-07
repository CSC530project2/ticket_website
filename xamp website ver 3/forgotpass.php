

<?php
  session_start();
  
  $secus=$_POST['forgot_user'];
  
  $conn = new mysqli('localhost','root','','test');
  $sql="select * from users where username='".$secus."' limit 1";

  if(isset($secus))
  {
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['forgot_user_session']=$secus;
        header("Location:changepass.php");
    }
    else
    {
        echo "Username does not exist";
    }


  }
 


?>






<!DOCTYPE html>
<!--SIGN UP PAGE-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="StyleSheet3.css">


</head>
<body>

    <h2>FOROGT PASSWORD</h2>
        <form action ="" method="post">
            <label>please enter username</lablel>
            <input type="text" name="forgot_user">
        <input type="submit">

        </form>

    </div>
</body>
</html>

