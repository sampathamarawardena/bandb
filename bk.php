<!DOCTYPE html>
<html>
<head>
    <title>B & B | City Name </title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <link href="css/styles.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        #test2{
            display: none;
        }
        #test3{
            display: none;
        }
        #test4{
            display: none;
        }
    </style>
</head>
<body>

<?php
$itemID = $_GET['id'];

include 'dbConnect.php';

$sql2 = "SELECT * FROM rentitems a  WHERE a.itemID = $itemID ";
$result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());

while ($r = mysqli_fetch_array($result)) {
    $Name = $r['Name'];
    $Phone = $r['Phone'];
    $RAddress = $r['Address'];
    $Rcity = $r['City'];
    $rooms = $r['Rooms'];
    $beds = $r['Beds'];
    $bathrooms = $r['Bathrooms'];
    $price = $r['Price'];
    $Discription = $r['Discription'];
    $totrooms = $rooms;
}

$sql3 = "SELECT * FROM bookings WHERE bookings.itemID = $itemID";
$result2 = mysqli_query($conn, $sql3) or die("Query fail: " . mysqli_error());

function avalability($startDate, $result2, $urooms, $totrooms)
{
    while ($rr = mysqli_fetch_array($result2)) {
        $bookfrom = $rr['BookFrom'];
        $bookto = $rr['BookTo'];
        $rooms = $rr['rooms'];
        $totrooms = $totrooms - $rooms;
        if (($startDate >= $bookfrom) && ($startDate <= $bookto)) {
            if ($urooms > $totrooms) {
                return false;
            } else {
                return true;
            }
        }
        else {
            return true;
        }
    }
}

if (isset($_POST['checkAv'])) {
    $stDate = $_POST['stDate'];
    $edDate = $_POST['edDate'];
    $urooms = $_POST['uroom'];

    if (avalability($stDate, $result2, $urooms, $totrooms) == true) {
    ?>
        <style type="text/css">
            #test{
                display: none;
            }
            #test2{
                display: block;
            }
        </style>
    <?php
                $sql4 = "SELECT * from users WHERE email='arunasampath418@gmail.com'";
                if($conn->query($sql4) == TRUE) {
                    $user = mysqli_query($conn, $sql4);
                    while ($res = $user->fetch_assoc()) {
                        $Fname = $res['Fname'];
                        $Lname = $res['Lname'];
                        $email = $res['email'];
                        $mobile = $res['Phone'];
                        $address = $res['Address'];
                        $city = $res['City'];
                    }
                }
    } else {
        echo "not availble";
    }

    if (isset($_POST['ifAvailable'])){
        ?>
        <style type="text/css">
            #test2{
                display: none;
            }
            #test3{
                display: block;
            }
        </style>
        <?php
    }

    if (isset($_POST['bookingDetails'])){
        ?>
        <style type="text/css">
            #test3{
                display: none;
            }
            #test4{
                display: block;
            }
        </style>
        <?php
    }
}
?>

<div class="container">
<div id="test" style=" width: 100% text-align: center">
    <h3> Check Availability</h3>
    <h3></h3>
    <?php echo "<form name='checkAv' action='bk.php?id=$itemID' method='post' class='form-horizontal'>" ?>
        <div class="form-group" >
            <label for="inputEmail3" class="col-sm-1 control-label">Check In</label>
            <div class="col-sm-2">
                <input name="stDate" type="date" class="form-control" id="inputEmail3" required="">
            </div>
            <label for="inputEmail3" class="col-sm-1 control-label">Check Out</label>
            <div class="col-sm-2">
                <input name="edDate" type="date" class="form-control" id="inputEmail3" required="">
            </div>
            <label for="inputEmail3" class="col-sm-2 control-label">How Many Rooms</label>
            <div class="col-sm-1">
                <input name="uroom" type="number" class="form-control" id="inputEmail3" required="">
            </div>
            <div id="test2" style=" width: 100% text-align: center">
                <br>
                <div style="background-color: #00a65a; color: white; height: 35px">
                    <center>
                        <h4 style="padding-top: 7px"> Congratulation,  Your rooms are available for booking</h4>
                    </center>
                </div>
            </div> <!-- Rooms are available getting user information -->
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="form-info">
                    <label style="width: 50%"  class="hvr-sweep-to-right">
                        <input type="submit" name="checkAv" value="Check Avalability">
                    </label>
                </div>
            </div>
        </div>
    </form>
</div>  <!-- Check Availability -->
<div id="test2" style=" width: 100% text-align: center">
    <br>
    <div style="background-color: #00a65a; color: white; height: 35px">
        <center>
            <h4 style="padding-top: 7px"> Congratulation,  Your rooms are available for booking</h4>
        </center>
    </div>
    <br>
    <h3><center>Your Information</center></h3>
    <br><br>
    <form name="ifAvailable" method="post" class="form-horizontal">
        <div class="form-group">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-3">
                        <?php echo "<input type='text' name='Fname' class='form-control' id='inputEmail3' value='$Fname'>" ?>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-3">
                        <?php echo "<input type='text' name='Lname' class='form-control' id='inputEmail3' value='$Lname'>" ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-2">
                        <?php echo "<input type='tel' name='phone' class='form-control' id='inputEmail3' value='$mobile'>" ?>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <?php echo "<input type='text' name='email' class='form-control' id='inputEmail3' value='$email'>" ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-8">
                        <?php echo "<input type='text' name='address' class='form-control' id='inputEmail3' value='$address , $city'>" ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="form-info">
                            <label style="width: 29%"  class="hvr-sweep-to-right">
                                <input type="submit" value="Back">
                            </label>
                            <label style="width: 50%"  class="hvr-sweep-to-right">
                                <input type="submit" value="Next">
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </form>
</div> <!-- Rooms are available getting user information -->
<div id="test3" style=" width: 100% text-align: center">
    <br>
    <h3><center>Booking Details</center></h3>
    <br><br>
    <h4>Your Details</h4>
    <form name="bookingDetails" action="bk.php?id=16" method="post" class="form-horizontal">
        <div class="form-group">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                    <?php echo "<label style='color: #00a65a; font-weight: bold; text-align: left' for='inputEmail3' class='col-sm-1 control-label'> $Fname </label>"?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                    <?php echo "<label style='color: #00a65a; font-weight: bold; text-align: left' for='inputEmail3' class='col-sm-1 control-label'> $Lname </label>"?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <?php echo "<label style='color: #00a65a; font-weight: bold; text-align: left' for='inputEmail3' class='col-sm-1 control-label'> $email </label>"?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                    <?php echo "<label style='color: #00a65a; font-weight: bold; text-align: left' for='inputEmail3' class='col-sm-1 control-label'> $mobile </label>"?>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                    <?php echo "<label style='color: #00a65a; font-weight: bold; text-align: left' for='inputEmail3' class='col-sm-4 control-label'> $address , $city </label>"?>
                </div>

            </form>
        </div>
    </form>

    <h4>Payment Details</h4>
    <form name="PaymentDetails" action="bk.php?id=16" method="post" class="form-horizontal">
        <div class="form-group">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Check In</label>
                    <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-1 control-label">5000 Rs</label>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Check Out</label>
                    <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-1 control-label">5000 Rs</label>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Total Days</label>
                    <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-1 control-label">5000 Rs</label>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Total Rooms</label>
                    <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-1 control-label">5000 Rs</label>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Rooms price per day</label>
                    <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-1 control-label">5000 Rs</label>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Total Amount</label>
                    <label style="color: #00a65a; font-weight: bold; font-size: larger; text-align: left" for="inputEmail3" class="col-sm-1 control-label">5000 Rs</label>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="form-info">
                            <label style="width: 29%"  class="hvr-sweep-to-right">
                                <input type="submit" value="Back">
                            </label>
                            <label style="width: 50%"  class="hvr-sweep-to-right">
                                <input type="submit" value="Next">
                            </label>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </form>

</div> <!-- Confermation show all the details -->
<div id="test4" style=" width: 100% text-align: center">
    <br>
    <h3><center>Payment</center></h3>
    <h4>Payment Details</h4>
    <form name="checkAv" action="bk.php?id=16" method="post" class="form-horizontal">
        <div class="form-group">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Card No</label>
                    <div class="col-sm-2">
                        <input name="ccno" type="number" class="form-control" id="inputEmail3" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Exp Date</label>
                    <div class="col-sm-2">
                        <input name="expDate" type="date" dataformatas="mm/yyyy" class="form-control" id="inputEmail3" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">CVV</label>
                    <div class="col-sm-2">
                        <input name="CVV" type="number" class="form-control" id="inputEmail3" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name on Card</label>
                    <div class="col-sm-2">
                        <input name="nameCard" type="text" class="form-control" id="inputEmail3" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="form-info">
                            <label style="width: 29%"  class="hvr-sweep-to-right">
                                <input type="submit" value="Cancel Booking">
                            </label>
                            <label style="width: 50%"  class="hvr-sweep-to-right">
                                <input type="submit" value="Pay">
                            </label>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </form>
</div>  <!-- getting credit card details -->
</div>
</body>
</html>