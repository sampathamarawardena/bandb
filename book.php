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
        $userID = $_POST['userID'];
        $Fname = $_POST['Fname'];
        $Lname  = $_POST['Lname'];
        $email = $_POST['email'];
        $mobile  = $_POST['phone'];
        $address  = $_POST['address'];
        $itemID = $_POST['itrmID'];
        $chceckin = $_POST['inDate'];
        $chceckOut = $_POST['outDate'];
        $stD = new DateTime($_POST['inDate']);
        $edD = new DateTime($_POST['outDate']);
        $uro = $_POST['rooms'];
        $oneRoom = $_POST['price'];
        $totdays = $edD->diff($stD)->format("%a");
        $tot = $totdays * $oneRoom;
?>
<div class="container">
<div id="test3" style=" width: 100% text-align: center">
    <br>
    <h3><center>Booking Details</center></h3>
    <br><br>
    <h3>Your Details</h3>
    <br>
    <form name="booking" action="pay.php" method="post" class="form-horizontal">
        <?php echo "
            <input type='text' name='userID' style='display: none' value='$userID'>
            <input type='text' name='itemID' style='display: none' value='$itemID'>
            <input type='text' name='checkIN' style='display: none' value='$chceckin'>
            <input type='text' name='checkOUT' style='display: none' value='$chceckOut'>
            <input type='text' name='rooms' style='display: none' value='$uro'>
        "?>

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
                <?php echo "<input type='text' name='price' style='display: none' value='$tot'>"?>
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
<?php
include ('public/footer.html');
?>


