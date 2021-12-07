<!DOCTYPE html>
<?php
 session_start();
 $con=mysqli_connect('localhost','root','','test');
 $get_cat=$_SESSION['category_session'];

 $sql="SELECT * FROM tickets where Category='$get_cat'";
 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>ticket website </title>
    <link rel="stylesheet" href="##" >


</head>
<style>
    table,th,td{
        border:1px solid black;
    }
</style>

<body>

<form action ="" method="post">
<h2>SEARCH TICKETS BY CATEGORY</h2>
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
            echo"<tr><td>" . $row1['ticekt_id'] . "</td><td>" . $row1['DATE_CREATED'] . "</td><td>" . $row1['poc'] . "</td><td>" . $row1['Category'] . "</td><td>" . $row1['description'] . "</td><td>" . $row1['DATE_RESOLVED']. "</td><td>" .$row1['current_assignee']. "</td><td>".$row1['State']. "</td></tr>";
            $edit--;
        }
        }
            
        ?>
        
    </table>
        
</form>

<ul>
    <li><a href="search_category.php">Search Category</a></li>
   
    </ul>
</body>
</html>