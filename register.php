<?php
include 'dbConnect.php';
$message = null;
if(isset($_POST['submit'])) {
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $email = $_POST['email'];
    $Phone = $_POST['Phone'];
    $Add = $_POST['address'];
    $City = $_POST['city'];
    $uname = $_POST['uname'];
    $Pass = $_POST['password'];
    $accType = $_POST['acctype'];

    $sql = "INSERT INTO users (Fname, Lname, email, Phone, Address, City, username, password, type)
                VALUES ('$Fname', '$Lname', '$email', '$Phone', '$Add', '$City', '$uname', '$Pass', '$accType')";

    if ($conn->query($sql) === TRUE) {
        $message = "success";
    } else {
        $message = "error";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>B & B | Register</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/jquery.min.js"></script>
        <script src="js/scripts.js"></script>
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <style>
            /* Popup container - can be anything you want */
            .popup {
                position: relative;
                display: inline-block;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            /* The actual popup */
            .popup .popuptext {
                visibility: hidden;
                width: 500px;
                height: 200px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 28px 0;
                position: absolute;
                z-index: 1;
                bottom: 125%;
                left: 50%;
                margin-left: -80px;
            }

            /* Popup arrow */
            .popup .popuptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            /* Toggle this class - hide and show the popup */
            .popup .show {
                visibility: visible;
                -webkit-animation: fadeIn 1s;
                animation: fadeIn 1s;
            }

            /* Add animation (fade in the popup) */
            @-webkit-keyframes fadeIn {
                from {opacity: 0;}
                to {opacity: 1;}
            }

            @keyframes fadeIn {
                from {opacity: 0;}
                to {opacity:1 ;}
            }
        </style>
</head>

<body>
<!--header-->
<?php include ('public/headerline.html') ?>
<!--//-->
<div class=" banner-buying">
    <div class=" container">
        <h3>Create <span>New</span> Account</h3>
    </div>
</div>
<div class="login-right">
    <div class="container">
        <div class="login-top">
            <div class="form-info">
                <form name="register" action="register.php" method="post">
                    <input type="text" name="fname"  placeholder="First Name" required="" >
                    <input type="text" name="lname"  placeholder="Last Name" required="" >
                    <input type="text"  name="email"  placeholder="Email Adress" required="" >
                    <input type="text" name="Phone"  placeholder="Phone Number" required="" >
                    <input type="text" name="address"  placeholder="Address" required="" >
                    <input type="text" name="city"  placeholder="City" required="" >
                    <input type="text" name="uname"  placeholder="Username" required="" >
                    <div>
                    Are you create account as a ?
                    <select style="color: black" name="acctype" class="in-drop" required="">
                        <option></option>
                        <option>Tourist</option>
                        <option>Renter</option>
                    </select>
                    </div>
                    <br>
                    <input type="password"  name="password" placeholder="Password " required="">
                    <div class="popup">
                        <span class="popuptext" id="myPopup">
                            <?php if ($message == "success") { ?>
                                You are Successfully create new account.
                                now go to
                                <a href="login.php"> Login Page</a>
                            <?php } else { ?>
                                an error occuers
                            <?php } ?>
                        </span>
                    </div>
                    <label style="width: 100%; font-weight: bold; color: #00a65a; font-size: larger" class="hvr-sweep-to-right">
                            <input type="submit" name="submit" value="Sign Up">
                    </label>
                </form>
                <p>Already have a account? <a href="login.php">Login</a></p>
                <?php
                    if ($message != null){
                        echo '<script type=\'text/javascript\'>
                                    var popup = document.getElementById("myPopup");
                                    popup.classList.toggle("show");
                              </script>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!--//contact-->
<!--footer-->
    <?php include ('public/footer.html') ?>
<!--//footer-->
</body>
</html>