<?php
//session.start();
error_reporting(0);

$firstname= $_POST['username'];
$pass =$_POST['password'];
$sec=$_POST['secrutiy'];
$ans=$_POST['answer'];


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
    $stmt =$conn->prepare("insert into users(username,password,secret,answer) values(?,?,?,?)");
    $stmt->bind_param("ssss",$firstname,$pass,$sec,$ans);
   // $_SESSION["USER_NAME_SESSION"]=$firstname;
    $stmt->execute();
    echo "success";
    $stmt->close();
    $conn->close();
    

}
}


?>

<!DOCTYPE html>
<!--SIGN UP PAGE-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="StyleSheet3.css">


</head>
<body>

    <div class="main2">
        <form action ="" method="post">
        <img src="avatar.jpg" />
        <label for="username">Enter new Username:</label>
        <input type="text" name="username" placeholder="Enter Username :)" />
        <br />
        <label for="password">Enter new Passowrd:</label>
        <input type="password" name="password" placeholder="Enter password :)" />
        <input type="submit" />
        <label for="ques">Secruity Question: </label>
        <select name="secrutiy">
            <option>Where did you grow up?</option>
            <option>What was the name of your first pet</option>
            <option>what is the name of your highschool</option>
        
        </select>
        <input type="text" name="answer">

</form>

    </div>
</body>
</html>

