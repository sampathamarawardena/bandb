<?php
include 'dbConnect.php';

$itemID = $_GET['id'];

$sql2 = "SELECT * FROM rentitems a  WHERE a.itemID = $itemID ";
$result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());

while ($r = mysqli_fetch_array($result)) {
    $Name = $r['Name'];
    $Phone = $r['Phone'];
    $Address = $r['Address'];
    $city = $r['City'];
    $rooms = $r['Rooms'];
    $beds = $r['Beds'];
    $bathrooms = $r['Bathrooms'];
    $price = $r['Price'];
    $Discription = $r['Discription'];
}
$sql3 = "SELECT * FROM images  WHERE itemID = $itemID ";
$results = mysqli_query($conn, $sql3) or die("Query fail: " . mysqli_error());
$i = 0;
while ($rr = mysqli_fetch_array($results)) {
    if($i == 0){
        $img = $rr['ImageLink'];
    }
    if ($i == 1){
        $img2 = $rr['ImageLink'];
    }
    if ($i == 2){
        $img3 = $rr['ImageLink'];
    }
    if ($i == 3){
        $img4 = $rr['ImageLink'];
    }
  $i = $i + 1;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> B and B | Name</title>
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
    <meta name="keywords" content="Real Home Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>

<!--header-->
<?php include ('public/headerline.html') ?>
<!--//-->

<div class=" banner-buying">
    <div class=" container">
        <h3><?php echo "$Name"?></h3>
    </div>
</div>
<!--//header-->

<div class="container">

    <div class="buy-single-single">
        <div class="col-md-9 single-box">
            <div class=" buying-top">
                <div class="flexslider" style="width: 100%">
                    <ul class="slides">
                        <?php echo "
                        <li data-thumb='/bandb/admin/$img'/>
                            <center><img style='height: 490px; width: 80%;' src='/bandb/admin/$img'/></center>
                        </li>
                        <li data-thumb='/bandb/admin/$img2'/>
                            <center><img style='height: 490px; width: 80%;' src='/bandb/admin/$img2'/></center>
                        </li>
                        <li data-thumb='/bandb/admin/$img3'/>
                            <center><img style='height: 490px; width: 80%;' src='/bandb/admin/$img3'/></center>
                        </li>
                        <li data-thumb='/bandb/admin/$img4'/>
                            <center><img style='height: 490px; width: 80%;' src='/bandb/admin/$img4'/></center>
                        </li>        
                        " ?>
                    </ul>
                </div>
                <!-- FlexSlider -->
                <script defer src="js/jquery.flexslider.js"></script>
                <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
            </div>
            <div class="buy-sin-single">
                <div class="col-sm-5 middle-side immediate">
                    <h4 style="color: black">Property details</h4>
                    <?php
                    echo "
                    <table style='width: 100%; color: black'>
                        <tr style='width: 100%'> 
                            <td style='width: 45%'><strong> Room </strong> </td>
                            <td style='width: 10%'> : </td>
                            <td style='width: 45%'> $rooms </td>
                        </tr>
                        <tr style='width: 100%'> 
                            <td style='width: 45%'><strong> Bed </strong> </td>
                            <td style='width: 10%'> : </td>
                            <td style='width: 45%'> $beds </td>
                        </tr>
                        <tr style='width: 100%'> 
                            <td style='width: 45%'><strong> Baths </strong> </td>
                            <td style='width: 10%'> : </td>
                            <td style='width: 45%'> $bathrooms </td>
                        </tr>
                        <tr style='width: 100%;'> 
                            <td style='width: 45%'><h4><strong> Price </strong></h4> </td>
                            <td style='width: 10%'> : </td>
                            <td style='width: 45%'><h4> $price Rs </h4></td>
                        </tr>
                    </table>
                    ";
                    ?>
                </div>
                <div class="col-sm-7 buy-sin">
                    <h4>Description</h4>
                    <?php echo "$Discription";
                     ?>
                </div>
                <div class="clearfix"> </div>
                <?php
                echo "
                <div class='right-side'>
                    <a style='width: 100%; height: 40px; color: #1b7e5a' href='gettingInfo.php?id=$itemID' class='hvr-sweep-to-right more'><center><h3><strong> Book Now </strong></h3></center></a>
                </div>
                "; ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="single-box-right right-immediate">
                <h4>Featured Communities</h4>
                <div class="single-box-img ">
                    <div class="box-img">
                        <a href="single.html"><img class="img-responsive" src="images/sl.jpg" alt=""></a>
                    </div>
                    <div class="box-text">
                        <p><a href="single.html">Lorem ipsum dolor sit amet</a></p>
                        <a href="single.html" class="in-box">More Info</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="single-box-img">
                    <div class="box-img">
                        <a href="single.html"><img class="img-responsive" src="images/sl1.jpg" alt=""></a>
                    </div>
                    <div class="box-text">
                        <p><a href="single.html">Lorem ipsum dolor sit amet</a></p>
                        <a href="single.html" class="in-box">More Info</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="single-box-img">
                    <div class="box-img">
                        <a href="single.html"><img class="img-responsive" src="images/sl2.jpg" alt=""></a>
                    </div>
                    <div class="box-text">
                        <p><a href="single.html">Lorem ipsum dolor sit amet</a></p>
                        <a href="single.html" class="in-box">More Info</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="single-box-img">
                    <div class="box-img">
                        <a href="single.html"><img class="img-responsive" src="images/sl3.jpg" alt=""></a>
                    </div>
                    <div class="box-text">
                        <p><a href="single.html">Lorem ipsum dolor sit amet</a></p>
                        <a href="single.html" class="in-box">More Info</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="single-box-img">
                    <div class="box-img">
                        <a href="single.html"><img class="img-responsive" src="images/sl4.jpg" alt=""></a>
                    </div>
                    <div class="box-text">
                        <p><a href="single.html">Lorem ipsum dolor sit amet</a></p>
                        <a href="single.html" class="in-box">More Info</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="container">
    <div class="future">
        <h3 >Feedbacks</h3>
        <div class="content-bottom-in">
            <?php
                $feed = "SELECT * FROM feedback  WHERE itemID = $itemID";
                $feedb = mysqli_query($conn, $feed);
                while ($feedback = mysqli_fetch_array($feedb)) {
                    $dis = $feedback['feedback'];
                    $day = $feedback['date'];
                    $user = $feedback['userID'];
                     echo "
                        <div class=\"alert alert-success\" role=\"alert\">
                             <h4> <strong> \"$dis\" </strong> &emsp; &emsp;-&emsp;$user</h4>
                             <h5 style='text-align: center'> $day</h5>
                        </div>
                        ";
                }
            ?>
        </div>
    </div>

</div>
<!---->

<!--footer-->

<?php  include ('public/footer.html') ?>
<!--//footer-->

</body>
</html>