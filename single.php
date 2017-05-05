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
                <div class="flexslider" style="width: 700px">
                    <ul class="slides">
                        <?php echo "
                        <li data-thumb='/bandb/admin/$img'/>
                            <img src='/bandb/admin/$img'/>
                        </li>
                        <li data-thumb='/bandb/admin/$img2'/>
                            <img src='/bandb/admin/$img2'/>
                        </li>
                        <li data-thumb='/bandb/admin/$img3'/>
                            <img src='/bandb/admin/$img3'/>
                        </li>
                        <li data-thumb='/bandb/admin/$img3'/>
                            <img src='/bandb/admin/$img3'/>
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
                    <h4>Property details</h4>
                    <?php
                    echo "<p><span class='bath'>Room</span>: <span class='two'>$rooms</span></p>";
                    echo "<p><span class='bath'>Bed </span>: <span class='two'>$beds</span></p>";
                    echo "<p><span class='bath'>Baths</span>: <span class='two'>$bathrooms</span></p>";
                    echo "<p><span class='bath'>Price</span>: <span class='two'>$price</span></p>";
                    echo "<div class='right-side'>
                        <a href='gettingInfo.php?id=$itemID' class='hvr-sweep-to-right more'>Book Now</a>
                    </div>";
                    ?>
                </div>
                <div class="col-sm-7 buy-sin">
                    <h4>Description</h4>
                    <?php echo "$Discription" ?>
                </div>
                <div class="clearfix"> </div>
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

<!---->
<div class="container">
    <div class="future">
        <h3 >Related Projects</h3>
        <div class="content-bottom-in">
            <ul id="flexiselDemo1">
                <li><div class="project-fur">
                        <a href="single.html" ><img class="img-responsive" src="images/pi.jpg" alt="" />	</a>
                        <div class="fur">
                            <div class="fur1">
                                <span class="fur-money">$2.44 Lacs - 5.28 Lacs </span>
                                <h6 class="fur-name"><a href="single.html">Contrary to popular</a></h6>
                                <span>Paris</span>
                            </div>
                            <div class="fur2">
                                <span>2 BHK</span>
                            </div>
                        </div>
                    </div></li>
                <li><div class="project-fur">
                        <a href="single.html" ><img class="img-responsive" src="images/pi1.jpg" alt="" />	</a>
                        <div class="fur">
                            <div class="fur1">
                                <span class="fur-money">$2.44 Lacs - 5.28 Lacs </span>
                                <h6 class="fur-name"><a href="single.html">Contrary to popular</a></h6>
                                <span>Paris</span>
                            </div>
                            <div class="fur2">
                                <span>2 BHK</span>
                            </div>
                        </div>
                    </div></li>
                <li><div class="project-fur">
                        <a href="single.html" ><img class="img-responsive" src="images/pi2.jpg" alt="" />	</a>
                        <div class="fur">
                            <div class="fur1">
                                <span class="fur-money">$2.44 Lacs - 5.28 Lacs </span>
                                <h6 class="fur-name"><a href="single.html">Contrary to popular</a></h6>
                                <span>Paris</span>
                            </div>
                            <div class="fur2">
                                <span>2 BHK</span>
                            </div>
                        </div>
                    </div></li>
                <li><div class="project-fur">
                        <a href="single.html" ><img class="img-responsive" src="images/pi3.jpg" alt="" />	</a>
                        <div class="fur">
                            <div class="fur1">
                                <span class="fur-money">$2.44 Lacs - 5.28 Lacs </span>
                                <h6 class="fur-name"><a href="single.html">Contrary to popular</a></h6>
                                <span>Paris</span>
                            </div>
                            <div class="fur2">
                                <span>2 BHK</span>
                            </div>
                        </div>
                    </div></li>
            </ul>
            <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo1").flexisel({
                        visibleItems: 4,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint:480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint:640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint:768,
                                visibleItems: 3
                            }
                        }
                    });

                });
            </script>
            <script type="text/javascript" src="js/jquery.flexisel.js"></script>
        </div>
    </div>

</div>

<!--footer-->
<?php include ('public/footer.html') ?>
<!--//footer-->

</body>
</html>