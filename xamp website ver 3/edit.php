<?php
   session_start();
   $state="test";
   error_reporting(0);
     
     
     

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

<form action ="" method="post">
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
       /*
        while($row=mysqli_fetch_array($result) AND $count!=0)
        {
            echo"<tr><td>" . $row['ticekt_id'] . "</td><td>" . $row['DATE_CREATED'] . 
            "</td><td>" . $row['poc'] . "</td><td>" . $row['Category'] . "</td><td>" 
            . $row['description'] . "</td><td>" . $row['current_assignee']. 
            "</td><td>" .$row['current_assignee']. "</td><td>" "<select name=$state>".$row['State']. "</select>""</td></tr>";
            $count--;
        }
        */
        while($row=mysqli_fetch_array($result) AND $count!=0)
        {
            $id=$row['ticekt_id'];
            $dc=$row['DATE_CREATED'];
            $poc=$row['poc'];
            $cat=$row['Category'];
            $des=$row['description'];
            $dr=$row['DATE_RESOLVED'];
            $ca=$row['current_assignee'];
            $st=$row['State'];
        }

    }

    
    
    ?>

    <?php
        $edit_id=$_POST['IDD'];
        $edit_created=$_POST['created'];
        $edit_users=$_POST['USERS'];
        $edit_categ=$_POST['categ'];
        $edit_dess=$_POST['dess'];
        $edit_resolved=$_POST['resolved'];
        $edit_curass=$_POST['curass'];
        $edit_sst=$_POST['sst'];
    $conn = mysqli_connect('localhost','root','','test');
    if(!$conn)
    {
        die("connection failed: " .mysqli_connect_error());
    }
    else
    {
        $sql2="UPDATE tickets SET ticekt_id ='$edit_id', DATE_CREATED='$edit_created', DATE_RESOLVED='$edit_resolved', poc ='$edit_users', Category='$edit_categ', description='$edit_dess', current_assignee='$edit_curass', State='$edit_sst' where ticekt_id ='$edit_id'";
        //$sql2="UPDATE tickets SET ticekt_id =$edit_id, DATE_CREATED=$edit_created, DATE_RESOLVED=$edit_resolved, poc =$edit_users, Category=$edit_categ, description=$edit_dess, current_assignee=$edit_curass, State=$edit_sst where ticekt_id =$edit_id ";
        
        if(isset($edit_id))
        {
        if(mysqli_query($conn,$sql2))
        {
            //header("Location:edit.php");
            //header("Refresh:0");
            
            echo "<meta http-equiv='refresh' content='0'>";
            echo"good";
        }
        else{
            echo"error: " .$conn->error;
        }
        }
    }
    
    
    


    ?>
    <tr>
        <td><input type="number" name="IDD"value=<?php echo $id?>></td>
        <td><input type="date" name="created" value="<?php echo $dc?>"></td>
        <td><input type="text" name="USERS" value="<?php echo $poc?>"></td>
        <td><input type="text" name="categ"value="<?php echo $cat?>"></td>
        <td><textarea name="dess"><?php echo $des?></textarea></td>
        <td><input type="date" name="resolved" value="<?php echo $dr?>"></td>
        <td><input type="text" name="curass" value=<?php echo $ca?>></td>
        <td><select name="sst"><option ><?php echo $st?></option><option>In Progress</option><option>fulfilled</option><option>Unresloved</option> </select></td>
        
        
    </tr>

    
   

  </table>
  
   <input type="submit">
   </form>
   <ul>
          <li><a href="view_all.php">View tickets</a></li>
          <li><a href="menu_admin.php">Menu</a></li>
          
        </ul>

</body>
</html>