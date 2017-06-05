<?php
session_start();

if(isset($_SESSION['email']))
{
    $uname = 1;
}
else{
    $uname = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>B & B | Feedback </title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--menu-->
    <script src="js/scripts.js"></script>
    <link href="css/styles.css" rel="stylesheet">
    <!--//menu-->
    <!--theme-style-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Real Home Responsive web template," />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>

<!--header-->
    <?php
        if($uname == 0) {
            include('public/headerline.html'); //logo, search, menu, login and register button
        }
        else{
            include('public/headerline2.php');
        }
    ?>
<!--//-->

// TODO: find a way to avoid such cloning
<div class=" banner-buying">
    <div class=" container">
        <h3><span>Feedba</span>ck</h3>
    </div>
</div>
<!--//header-->
<!--contact-->
<div class="feedback">
    <div class="container">
        <h3>Feedback</h3>
        <div class="feedback-top">
            <form>
                <input type="text"  placeholder="Name"  required="">
                <input type="text"  placeholder="Email " required="" >
                <textarea  placeholder="Feedback" requried=""></textarea>
                <label class="hvr-sweep-to-right">
                    <input type="submit" value="Send Feedback">
                </label>
            </form>
        </div>
    </div>
</div>
<!--//contact-->

<!--footer-->
<?php include ('public/footer.html') ?>
<!--//footer-->
</body>
</html>