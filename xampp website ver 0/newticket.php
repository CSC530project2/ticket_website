<?php


  session_start();
    error_reporting(0);
     
    $Description=$_POST['Description'];
    $Category =$_POST['cat'];
   
    $status='Unresloved';
    
    if(isset($Description)||isset($Category))
    {
        $conn = new mysqli('localhost','root','','test');
       // $sqli="INSERT INTO tickets(description,Category,State,poc) VALUES($Description',$Category,$status,$_SESSION['USER_SESSION'])";


        if($conn->connect_error)
        {
        die('Connection Failed : '.$conn->connect_error);
    
        }
        else
        {
        
          $stmt =$conn->prepare("insert into tickets(description,Category,State,poc) values(?,?,?,?)");
         $stmt->bind_param("ssss",$Description,$Category,$status,$_SESSION["USER_SESSION"]);
   
        $stmt->execute();
        echo "success";
       // echo $_SESSION["USER_SESSION"];
        $stmt->close();
        $conn->close();
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
<body>
  <h2>SUBMIT TICKET</h2>
  <div class="main">

    <form action ="" method="post">
    <label class="text-white">Category:</label>
    <select name="cat">
        
        <option>Computer slowdown</option>
        <option>Blank monitor</option>
        <option>Computer doesnt connect to wifi</option>
        <option>Computer Crashing</option>
        <option>Program not working</option>
    </select>
    <br/>
    <label class="text-white">Description</label>
    <br/>
    <textarea name="Description"></textarea>

    <p>Date Created<span i></span></p>
    <input type="submit" />
    </form>
  </div>

  <ul>
    
   
   
    
    
  <li><a href="menu.php">Menu</a></li>

  </ul>
   
</body>
</html>