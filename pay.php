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

$price = $_POST['price'];
echo $price;


?>
<div class="container">

</div>
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
                                <input onclick="window.history.go(3)" type="submit" value="Cancel Booking">
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

<?php
include ('public/footer.html');
?>


