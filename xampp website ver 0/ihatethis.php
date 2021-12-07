<?php

  error_reporting(0);
     session_start();
    $Description=$_POST['Description'];
    $Category =$_POST['cat'];
    $USER = $_SESSION['USER_SESSION'];
    $REAL_USER=$_POST[$USER];
    $status='Unresloved';
    $test='yahya';
    if(isset($Description)||isset($Category))
    {
        $conn = new mysqli('localhost','root','password','test');


        if($conn->connect_error)
        {
            echo"test";
        die('Connection Failed : '.$conn->connect_error);
    
        }
        else
        {
        $stmt =$conn->prepare("insert into tickets(Description,Category,State,POC) values(?,?,?,?)");
        $stmt->bind_param("ssss",$Description,$Category,$status,$test);
        $stmt->execute();
        echo "success";
        $stmt->close();
        $conn->close();
        }
    }
?>

