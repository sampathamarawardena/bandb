<?php

session_start();
if(isset($_SESSION['email']))
{
    $uname = 1;
}
else{
    $uname = 0;
}
include ('public/header.php'); // files include html
if($uname == 0) {
    include('public/headerline.php'); //logo, search, menu, login and register button
}
else{
    include('public/headerline2.php');
}
include ('public/slider.html'); //slider

include ('public/advancedSearch.php'); // advanced search

include ('public/selectCity.html'); // top city

//include ('public/mostPopular.php'); // most popular adds

include ('public/footer.html'); //footer
?>


