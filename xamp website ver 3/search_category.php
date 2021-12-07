<?php
    session_start();
    error_reporting(0);
    $sql="SELECT * FROM tickets";
    $con=mysqli_connect('localhost','root','','test');
    $search_sub=$_POST['catee'];


    if(isset($search_sub))
    {
        if($con->connect_error)
        {
        die('Connection Failed : '.$con->connect_error);
    
        }
        else
        {
            $_SESSION['category_session']=$search_sub; //this variable saves the value of user that is going to be edit
        header("Location:search_real_cat.php");
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
  <h2>SEARCH TICKETS BY CATEGORY</h2>
    <select name="catee">

        <option>Computer slowdown</option>
        <option>Blank monitor</option>
        <option>Computer doesnt connect to wifi</option>
        <option>Computer Crashing</option>
        <option>Program not working</option>
    
        <?php
        /*
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
           echo"<option>" .$row1['Category']. "</option>";
           // $edit--;
        }
        }
            */
        ?>
        
        </select>
        <input type="submit">
        <ul>
        
        <li><a href="view_all.php">view tickets</a></li>
        <li><a href="menu_admin.php">BACK TO MENU</a></li>
        
    </ul>
</form>
</body>
</html>