<?php
$itemID = $_GET['id'];
session_start();
include ('public/header.php');
if(isset($_SESSION['email']))
{
    include('public/headerline.html');

}
else{
    include('public/headerline2.html');
    $uname = 0;
}
 // files include html

include ('public/footer.html');
?>


