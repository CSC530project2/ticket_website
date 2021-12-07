<?php
error_reporting(0);
$ed_users=$_POST['edituser'];

session_start();


  $con = new mysqli('localhost','root','','test');
  $sql = "SELECT * FROM users";
  $result =mysqli_query($con,$sql);
  $result1 =mysqli_query($con,$sql);

  if(isset($ed_users))
{
    if($con->connect_error)
        {
        die('Connection Failed : '.$con->connect_error);
    
        }
    else
    {
        $_SESSION['eduser']=$ed_users; //this variable saves the value of user that is going to be edit
        header("Location:edituser.php");
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

    <h2>VIEW USERS</h2>

    <table>
        <tr>
            <th>Username: </th>
            <th>Password: </th>
            <th>type: </th>
        </tr>
        <?php
        $row=mysqli_num_rows($result);
        $count = $row;
        $count1=$row;
        ?>

        
            <?php
                while($row=mysqli_fetch_array($result) AND $count!=0)
                {
                    echo "<tr><td>" .$row['username']. "</td><td>" .$row['password']. "</td><td>" .$row['type']. "</td></tr>";
                    $count--;
                }

            ?>

        

    </table>
    <label>Edit Users</label>
    <form action="" method="post">
                <select name="edituser">
                    <?php
                        while($row1=mysqli_fetch_array($result1) AND $count1 !=0)
                        {
                            echo"<option>".$row1['username']. "</option>";
                        }



                    ?>




                </select>
                <br>
                <input type="submit">
    </form>
  
    <ul>
          
        
          
        </ul>

</body>
</html>