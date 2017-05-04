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
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>

<!--header-->
<?php include ('public/headerline.html')?>
<!--//-->
<div class=" banner-buying">
    <div class=" container">
        <h3>Login to <span>B</span> and <span>B</span></h3>
    </div>
</div>
<div class="login-right">
    <div class="container">
        <h3>Login</h3>
        <div class="login-top">
            <div class="form-info">
                <form action="login_check.php" method="post" >
                    <input type="text" class="text" placeholder="Email Adress" name="email" required="">
                    <input type="password"  placeholder="Password" name="password" required="">
                    <label style="width: 100%; font-weight: bold; color: #00a65a; font-size: larger" class="hvr-sweep-to-right">
                        <input type="submit" value="Login">
                    </label>
                </form>
            </div>
            <div class="create">
                <h4>New To B and B ?</h4>
                <a class="hvr-sweep-to-right" href="register.php">Create an Account</a>
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