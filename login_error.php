<!DOCTYPE html>
<html>
<head>
    <title>B & B | Login</title>
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
    <meta name="keywords" content="Real Home Responsive web template" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>

<!--header-->
<?php include ('public/headerline.html')?>
<!--//-->
<div class=" banner-buying">
    <div class=" container">
        <h3><span>Log</span>in</h3>
    </div>
</div>
<!--//header-->
<!--contact-->
<div class="login-right">
    <div class="container">
        <h3>Login</h3>
        <div class="login-top">
            <ul class="login-icons">
                <li><a href="#" ><i class="facebook"> </i><span>Facebook</span></a></li>
                <!--<li><a href="#" class="twit"><i class="twitter"></i><span>Twitter</span></a></li> -->
                <li><a href="#" class="go"><i class="google"></i><span>Google +</span></a></li>
                <!--<li><a href="#" class="in"><i class="linkedin"></i><span>Linkedin</span></a></li>
                <div class="clearfix"> </div> -->
            </ul>

            <div class="form-info">
                <form action="login_check.php" method="post" >
                    <input type="text" class="text" placeholder="Email Adress" name="email" required="">
                    <input type="password"  placeholder="Password" name="password" required="">
                    <label class="hvr-sweep-to-right">
                        <input type="submit" value="Submit">
                    </label>
                </form>
            </div>
            <h4 style="color: red"><center><b> Login Error </b> Please Try Again </center></h4>
            <div class="create">
                <h4>New To Real Home?</h4>
                <a class="hvr-sweep-to-right" href="register.html">Create an Account</a>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--//contact-->
<!--footer-->
<?php include ('public/footer.html')?>
<!--//footer-->
</body>
</html>