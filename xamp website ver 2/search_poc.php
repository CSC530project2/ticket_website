<?php
    session_start();
    error_reporting(0);
    $sql="SELECT * FROM users";
    $con=mysqli_connect('localhost','root','','test');
    $search_poc=$_POST['poc'];


    if(isset($search_poc))
    {
        if($con->connect_error)
        {
        die('Connection Failed : '.$con->connect_error);
    
        }
        else
        {
            $_SESSION['poc_session']=$search_poc; 
           header("Location:search_real_poc.php");
        }
    }




?>








<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>ticket website </title>
    <link rel="stylesheet" href="##" >


</head>

<body>
<form action ="" method="post">
  <h2>SEARCH TICKET BY POINT-OF-CONTACT</h2>
    <select name="poc">

  
    
        <?php
        
        $get_cat=$_POST['catee'];

        
        if(mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL:" . mysqli_connect_error();
        }
        else
        {

            
            $result=mysqli_query($con,$sql);
            $edit=mysqli_num_rows($result);

            while($row1=mysqli_fetch_array($result) AND $edit!=0)
        {
           echo"<option>" .$row1['username']. "</option>";
            $edit--;
        }
        }
            
        ?>
        
        </select>
        <input type="submit">
</form>
<ul>
        
        <li><a href="view_all.php">view tickets</a></li>
        <li><a href="menu_admin.php">BACK TO MENU</a></li>
        
    </ul>
</body>
</html>