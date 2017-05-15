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
    while ($r = mysqli_fetch_array($result)) {
        $accType = $r['type'];
        $name = $r['Fname'];
        $lname = $r['Lname'];
    }

    //$fullname = $name + " " + $lname;
    //$_SESSION['email'] = $fullname;

    if($accType == "Renter"){
        header("location:index.php");
    }
    elseif ($accType == "Tourist"){
        header("location:admin/index.php");
    }
}
else{
    header("location:login_error.php");
}
