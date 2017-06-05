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
?>

<head>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <script type="text/javascript" src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery.ui.all.css">

    <style type="text/css">
        .ui-datepicker-calendar {
            display: none;
        }
    </style>

    <script type='text/javascript'>//<![CDATA[
        $(window).load(function(){
            $(document).ready(function() {
                $('#txtDate').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'MM yy',

                    onClose: function() {
                        var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                        var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
                    },

                    beforeShow: function() {
                        if ((selDate = $(this).val()).length > 0)
                        {
                            iYear = selDate.substring(selDate.length - 4, selDate.length);
                            iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), $(this).datepicker('option', 'monthNames'));
                            $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
                            $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
                        }
                    }
                });
            });
        });//]]>
    </script>
</head>
<div class="container">
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
                            <input name="expDate" class="form-control" type='text' id='txtDate' required="">
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
</div>
<script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
        window.parent.parent.postMessage(["resultsFrame", {
            height: document.body.getBoundingClientRect().height,
            slug: "2NVRD"
        }], "*")
    }
</script>


<?php

include ('public/footer.html');
?>


