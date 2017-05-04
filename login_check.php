<?php
include ('dbConnect.php');

$uname = $_POST['email'];
$password = $_POST['password'];

$sql2 = "SELECT * FROM `users` WHERE `username`= '$uname' AND `password`= '$password'";

$result = mysqli_query($conn, $sql2) or die(mysqli_errno());
$count = mysqli_num_rows($result);
if($count == 1){
    session_start();
    $_SESSION['email'] = $uname;
    echo "Connect";

    if(isset($_SESSION['email'])){
        header("location:http://localhost/bandb/index.php");
    }
    else{
        header("location:http://localhost/bandb/login.php");
    }
}
else{
    header("location:http://localhost/bandb/login_error.php");
}
