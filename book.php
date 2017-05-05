<?php

include ('public/header.php');

session_start();

if(isset($_SESSION['email']))
{
    include ('public/headerline2.php');
}
else{
    include ('public/headerline.php');
}


$Fname = $_POST['Fname'];
$Lname  = $_POST['Lname'];
$email = $_POST['email'];
$mobile  = $_POST['phone'];
$address  = $_POST['address'];
$id = $_POST['id'];
$stD = new DateTime($_POST['inDate']);
$edD = new DateTime($_POST['outDate']);
$uro = $_POST['rooms'];
$oneRoom = $_POST['price'];
$totdays = $edD->diff($stD)->format("%a");
$tot = $totdays * $oneRoom;

 // files include html

?>
<div class="container">
<div id="test3" style=" width: 100% text-align: center">
    <br>
    <h3><center>Booking Details</center></h3>
    <br><br>
    <h3>Your Details</h3>
    <br>
    <form name="booking" action="pay.php" method="post" class="form-horizontal">
        <div class="form-group">
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
                    <?php echo "<label style='color: #00a65a; font-weight: bold; text-align: left' for='inputEmail3' class='col-sm-4 control-label'> $address  </label>"?>
                </div>
        </div>
        <br>
        <h3>Booking Details</h3>
        <br>
        <div class="form-group">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Check In</label>
                <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-2 control-label"><?php echo date_format($stD, 'Y-m-d') ?></label>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Check Out</label>
                <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-2 control-label"><?php echo date_format($edD, 'Y-m-d') ?></label>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Total Days</label>
                <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-2 control-label"><?php echo $totdays ?></label>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Total Rooms</label>
                <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-2 control-label"><?php echo $uro ?></label>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Rooms price per day</label>
                <label style="color: #00a65a; font-weight: bold; text-align: left" for="inputEmail3" class="col-sm-2 control-label"><?php echo $oneRoom ?></label>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Total Amount</label>
                <label style="color: #00a65a; font-weight: bold; font-size: larger; text-align: left" for="inputEmail3" class="col-sm-1 control-label"><?php echo $tot ?></label>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="form-info">
                        <label style="width: 29%; font-weight: bold"  class="hvr-sweep-to-right">
                            <input type="submit" value="Cancel booking">
                        </label>
                        <label style="width: 50%; color: #00a65a; font-weight: bold"  class="hvr-sweep-to-right">
                            <input name="test" type="submit"  value="Pay for booking">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div> <!-- Confermation show all the details -->

</div>
<?php /*
<div id="test4" style=" width: 100% text-align: center">
    <br>
    <h3><center>Payment</center></h3>
    <h4>Payment Details</h4>
    <form name="checkAv" action="gettinginfo.php?id=16" method="post" class="form-horizontal">
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

<?php */
include ('public/footer.html');
?>


