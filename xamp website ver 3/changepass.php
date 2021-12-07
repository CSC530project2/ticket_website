<?php
 session_start();
 $test=4;
 
 $remember_us=$_SESSION['forgot_user_session'];
 $conn = new mysqli('localhost','root','','test');
$newpd=$_POST['pass'];
$repd=$_POST['repass'];
$sec_answer=$_POST['sec_answer'];

 $sql2="select * from users where username='".$remember_us."' ";
 $sql="UPDATE users SET password='$newpd' where username='$remember_us' ";
 $result=mysqli_query($conn,$sql2);
 $result2=mysqli_query($conn,$sql2);
 $count2=1;

 while($row1=mysqli_fetch_array($result2) AND $count2!=0)
 {
     $checker=$row1['answer'];
     $count2--;
 }



 if(isset($newpd)||isset($repd))
 {
     if($checker==$sec_answer)
     {

     if($newpd==$repd)
     {
        if(mysqli_query($conn,$sql))
        {
            
            header("Location:Page2.php");
        }
    }
    else
        {
            echo"passwords much match";
        }
    }
    else
    {
        echo"wrong answer";
    }
 }




 $count=1;



 

?>






<!DOCTYPE html>
<!--SIGN UP PAGE-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="##">


</head>
<body>

    <h2>FOROGT PASSWORD</h2>
        <form action ="" method="post">


            <?php
                while($row1=mysqli_fetch_array($result) AND $count !=0)
                {
                    echo $row1['secret'];
                    
                    $count--;
                }

            ?>
            <br>
            <label>please enter answer: </lablel>
            <input type="text" name="sec_answer">
            <br>
            <label>Enter new password: </lablel>
            <input type="password" name="pass">
            <br>
            <label>Reenter new password: </lablel>
            <input type="password" name="repass">
            <br>
        <input type="submit">

</form>

    </div>
</body>
</html>

