<?php
   session_start();
   $state="test";
   error_reporting(0);

   $con=mysqli_connect('localhost','root','','test');
   if(mysqli_connect_errno())
   {
       echo "Failed to connect to MySQL:" . mysqli_connect_error();
   }
   else
   {
      
      $sql="select * from users where username ='".$_SESSION['eduser']."'  limit 1";
       $result=mysqli_query($con,$sql);
      // echo $row=mysqli_num_rows($result);
      $count = 1;
    
       while($row=mysqli_fetch_array($result) AND $count!=0)
       {
           $us=$row['username'];
           $pw=$row['password'];
           $tp=$row['type'];
          
       }

   }

     
     
     

?>

<?php

$finalpwd=$_POST['pwd'];
$finaltype=$_POST['typ'];
$finaluser=$_SESSION['eduser'];

if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
}
else
{
    $sql3="UPDATE users SET password='$finalpwd', type='$finaltype' WHERE username='$finaluser'";
    if(isset($_POST['pwd']))
    {
        if(mysqli_query($con,$sql3))
        {
            echo "<meta http-equiv='refresh' content='0'>";
        }
        else{
            echo"error: " .$conn->error;
        }
    }
}



?>



<!DOCTYPE html>
<!--log in page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="#">


</head>
<style>
    table,th,td{
        border:1px solid black;
    }
</style>
<body>
    <h2>EDIT/UPDATE TICKET</h2>
<form action ="" method="post">
  
<table>
        <tr>
            <th>Username: </th>
            <th>Password: </th>
            <th>type: </th>
        </tr>
        <tr>
            <td><?php echo $us?></td>
            <td><input type="text" name="pwd" value=<?php echo $pw?>></td>
            <td><select name="typ"><option><?php echo $tp?></option><option>admin</option><option>members</option></td>
        </tr>   



</table>
   <input type="submit">
</form>

<ul>
          <li><a href="viewuser.php">View Users</a></li>
          <li><a href="menu_admin.php">MENU</a></li>
          
        </ul>

</body>
</html>