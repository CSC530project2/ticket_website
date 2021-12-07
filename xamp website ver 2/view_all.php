<?php
//for selecting
session_start();
  $con = new mysqli('localhost','root','','test');
  $sql = "SELECT * FROM tickets";
  $result =mysqli_query($con,$sql);
  $result1=mysqli_query($con,$sql);
  $id=$_POST['edit/del'];
  /*
  echo"<table>";
  echo"<tr>";
  
  echo"<th>ticket_id:</th>
  <th>Date Created:</th>
  <th>Date Resolved:</th>
  <th>POC:</th>
  <th>Category:</th>
  <th>Description:</th>
  <th></th>";
   echo" </tr>"
*/
?>

<?php
//for inserting
if(isset($id))
{
    if($conn->connect_error)
        {
        die('Connection Failed : '.$conn->connect_error);
    
        }
    else
    {
        $_SESSION['id_session']=$id;
        header("Location:edit.php");
    }
}
?>


<!DOCTYPE html>
<!--log in page-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="##">


</head>
<style>
    table,th,td{
        border:1px solid black;
    }
</style>
<body>
  <h2>Ticket edit/delete </h2>
  <table style="width:100%">
    <tr>
        <th>ticket_id:</th>
        <th>Date Created:</th>
        <th>POC:</th>
        <th>Category:</th>
        <th>Description:</th>
        <th>Date Resolved:</th>
        <th>current_assignee</th>
        <th>State</th>
    </tr>

    <?php
    //table section!!!
        echo $row=mysqli_num_rows($result);
       $count = $row;
   // $edit=$row;
      

        while($row=mysqli_fetch_array($result) AND $count!=0)
        {
            echo"<tr><td>" . $row['ticekt_id'] . "</td><td>" . $row['DATE_CREATED'] . "</td><td>" . $row['poc'] . "</td><td>" . $row['Category'] . "</td><td>" . $row['description'] . "</td><td>" .$row['DATE_RESOLVED']. "</td><td>" .$row['current_assignee']. "</td><td>".$row['State']. "</td></tr>";
            $count--;
        }
    
    ?>
      
  </table>

   <?php
   
    $row1=mysqli_num_rows($result1);
    $edit=$row1;
    echo "please select a ticket ID to edit/delete";
   ?>
  
  <form action ="" method="post">
  
    <select name="edit/del">
        <option>test</option>
        <?php
         
        
        
        while($row1=mysqli_fetch_array($result1) AND $edit!=0)
        {
           echo"<option>" .$row1['ticekt_id']. "</option>";
            $edit--;
        }
        
        ?>
    </select>
    <input type="submit" />
  
    </form>
    <ul>
        
        <li><a href="search_category.php">Search Category</a></li>
        <li><a href="search_poc.php">Search Point-of-Contact</a></li>
       
    </ul>
</body>
</html>