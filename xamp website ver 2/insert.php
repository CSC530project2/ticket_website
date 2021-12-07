<?php
error_reporting(0);

$firstname= $_POST['username'];
$pass =$_POST['password'];



if(isset($firstname)||isset($pass))
{

$dbUsername ="root";
$dbPassword="password";
$dbname ="test";
$conn = new mysqli('localhost',$dbUsername,'',$dbname);

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);

}
else {
    $stmt =$conn->prepare("insert into users(username,password) values(?,?)");
    $stmt->bind_param("ss",$firstname,$pass);
    $stmt->execute();
    echo "success";
    $stmt->close();
    $conn->close();

}
}


?>


