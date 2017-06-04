<?php
session_start();

if(isset($_SESSION['email']))
{
    $uname = 1;
}
else{
    $uname = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>B & B | City Name </title>
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
<?php
$getthis = $_GET['city'];
    include('dbConnect.php');
    if($uname == 0) {
        include('public/headerline.html'); //logo, search, menu, login and register button
    }
    else{
        include('public/headerline2.php');
    }
?>
<div class="single">
    <div class="container">
        <div class="buy-single">
            <?php
            echo"<h3>$getthis</h3>";
            $sql2 = "SELECT * 
                        FROM rentitems a , images b 
                        WHERE a.itemID = b.itemID AND  a.City = '$getthis'
                        GROUP by a.itemID";
            $result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());

            echo "<div class='box-sin'> <div class='col-md-9 single-box'>";
            while ($r = mysqli_fetch_array($result)){
                $itemID = $r['itemID'];
                $img = $r['ImageLink'];
                $name = $r['Name'];
                $rooms = $r['Rooms'];
                $beds = $r['Beds'];
                $price = $r['Price'];
                $bathrooms = $r['Bathrooms'];
                $city = $r['City'];
                $town = $r['Town'];
                echo  "<div class='box-col'>
                                <div class='col-sm-7 left-side '>
                                    <a href='single.php'> <img class='img-responsive' src='/bandb/admin/$img'></a>
                                </div>
                                <div class='col-sm-5 middle-side'>
                                    <h4> $name </h4>
                                    <table>
                                        <tr>
                                            <th width='100px' ></th>
                                            <th width='20px'></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td><p><span class='bath5'>No of rooms</span></p></td>
                                            <td><p>:</p></td>
                                            <td><p><span class='two'> $rooms </span></p></td>
                                        </tr>
                                        <tr>
                                            <td> <p><span class='bath5'>Beds</span></p></td>
                                            <td><p>:</p></td>
                                            <td><p><span class='two'> $beds </span></p></td>
                                        </tr>
                                        <tr>
                                            <td> <p><span class='bath5'>Baths</span></p></td>
                                            <td><p>:</p></td>
                                            <td><p><span class='two'>$bathrooms</span></p></td>
                                        </tr>
                                        <tr>
                                            <td> <p><span class='bath5'>location</span></p></td>
                                            <td><p>:</p></td>
                                            <td><p><span class='two'>$city / $town </span></p></td>
                                        </tr>
                                        <tr>
                                            <td> <p><span class='bath5'>Price</span></p></td>
                                            <td><p>:</p></td>
                                            <td><p><span class='two'>$price LKR</span></p></td>
                                        </tr>
                                    
                                    </table>
                                    <div class='right-side'>
                                        <a href='single.php?id=$itemID' class='hvr-sweep-to-right more' >More Info</a>
                                    </div>
                                </div>
                                <div class='clearfix'> </div>
                            </div>";
            }

            echo "</div> </div>";
            ?>


          <!--
            <div class="col-md-3 map-single-bottom">
                <div class="single-box-right">
                    <h4>Featured Communities</h4>
                    <div class="single-box-img">
                        <div class="box-img">
                            <a href="single.php"><img class="img-responsive" src="images/sl.jpg" alt=""></a>
                        </div>
                        <div class="box-text">
                            <p><a href="single.php">Lorem ipsum dolor sit amet</a></p>
                            <a href="single.php" class="in-box">More Info</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-box-img">
                        <div class="box-img">
                            <a href="single.php"><img class="img-responsive" src="images/sl1.jpg" alt=""></a>
                        </div>
                        <div class="box-text">
                            <p><a href="single.php">Lorem ipsum dolor sit amet</a></p>
                            <a href="single.php" class="in-box">More Info</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-box-img">
                        <div class="box-img">
                            <a href="single.php"><img class="img-responsive" src="images/sl2.jpg" alt=""></a>
                        </div>
                        <div class="box-text">
                            <p><a href="single.php">Lorem ipsum dolor sit amet</a></p>
                            <a href="single.php" class="in-box">More Info</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-box-img">
                        <div class="box-img">
                            <a href="single.php"><img class="img-responsive" src="images/sl3.jpg" alt=""></a>
                        </div>
                        <div class="box-text">
                            <p><a href="single.php">Lorem ipsum dolor sit amet</a></p>
                            <a href="single.php" class="in-box">More Info</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-box-img">
                        <div class="box-img">
                            <a href="single.php"><img class="img-responsive" src="images/sl4.jpg" alt=""></a>
                        </div>
                        <div class="box-text">
                            <p><a href="single.php">Lorem ipsum dolor sit amet</a></p>
                            <a href="single.php" class="in-box">More Info</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>

          -->

            <div class="clearfix"> </div>
        </div>

    </div>

</div>

<!--footer-->
<?php include ('public/footer.html') ?>
</body>
</html>