<?php
   session_start();
   $state="test";
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
    $con=mysqli_connect('localhost','root','','test');
    if(mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL:" . mysqli_connect_error();
    }
    else
    {
       
       $sql="select * from tickets where ticekt_id ='".$_SESSION['id_session']."'  limit 1";
        $result=mysqli_query($con,$sql);
       // echo $row=mysqli_num_rows($result);
       $count = 1;
       
       //THIS APPROCH WAS ABANDONED BECAUSE OF THE NEED OF HTML ATTRIBUTES, AND UNABLE TO USE SINCE MOST OF CODE HERE IS IN PHP.
        while($row=mysqli_fetch_array($result) AND $count!=0)
        {
            echo"<tr><td>" . $row['ticekt_id'] . "</td><td>" . $row['DATE_CREATED'] . 
            "</td><td>" . $row['poc'] . "</td><td>" . $row['Category'] . "</td><td>" 
            . $row['description'] . "</td><td>" . $row['current_assignee']. 
            "</td><td>" .$row['current_assignee']. "</td><td>" "<select name=$state>".$row['State']. "</select>""</td></tr>";
            $count--;
        }
        
        

    }

    
    
    ?>
    

    
   

  </table>
  
 
</body>
</html>