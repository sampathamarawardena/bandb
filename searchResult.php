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
    <script src="js/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Real Home Responsive web template" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>

<!--header-->
<?php
include('dbConnect.php');
if($uname == 0) {
    include('public/headerline.php'); //logo, search, menu, login and register button
}
else{
    include('public/headerline2.php');
}
?>
<div class="single">
    <div class="container">
        <h3>Search Results</h3>
        <div class="buy-single">
            <?php
            $serCity = $_GET['serCity'];
            $NoRooms = $_GET['NoRooms'];
            $PriceFrom = $_GET['PriceFrom'];
            $PriceTo = $_GET['PriceTo'];
            $result = null;
            if($serCity != "Select City"){
                if($NoRooms != "No. of Bedrooms"){
                    if($PriceFrom != "Price From"){
                        $sql2 = "SELECT * 
                        FROM rentitems a , images b 
                        WHERE a.itemID = b.itemID AND a.City = '$serCity' AND a.Rooms >= '$NoRooms' AND a.Price BETWEEN '$PriceFrom' AND '$PriceTo'
                        GROUP by a.itemID";
                        $result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());
                    }
                    else{
                        $sql2 = "SELECT * 
                        FROM rentitems a , images b 
                        WHERE a.itemID = b.itemID AND a.City = '$serCity' AND a.Rooms >= '$NoRooms'
                        GROUP by a.itemID";
                        $result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());
                    }
                }
                else{
                    if($PriceFrom != "Price From"){
                        $sql2 = "SELECT * 
                        FROM rentitems a , images b 
                        WHERE a.itemID = b.itemID AND a.City = '$serCity' AND a.Price BETWEEN '$PriceFrom' AND '$PriceTo'
                        GROUP by a.itemID";
                        $result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());
                    }
                    else{
                        $sql2 = "SELECT * 
                        FROM rentitems a , images b 
                        WHERE a.itemID = b.itemID AND  a.City = '$serCity'
                        GROUP by a.itemID";
                        $result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());
                    }
                }
            } else{
                if($NoRooms != "No. of Bedrooms"){
                    if($PriceFrom != "Price From"){
                        $sql2 = "SELECT * 
                        FROM rentitems a , images b 
                        WHERE a.itemID = b.itemID AND a.Rooms >= '$NoRooms' AND a.Price BETWEEN '$PriceFrom' AND '$PriceTo'
                        GROUP by a.itemID";
                        $result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());
                    }
                    else{
                        $sql2 = "SELECT * 
                        FROM rentitems a , images b 
                        WHERE a.itemID = b.itemID AND a.Rooms >= '$NoRooms'
                        GROUP by a.itemID";
                        $result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());
                    }
                }
                else{
                    if($PriceFrom != "Price From"){
                        $sql2 = "SELECT * 
                        FROM rentitems a , images b 
                        WHERE a.itemID = b.itemID AND a.Price BETWEEN '$PriceFrom' AND '$PriceTo'
                        GROUP by a.itemID";
                        $result = mysqli_query($conn, $sql2) or die("Query fail: " . mysqli_error());
                    }
                }
            }
            echo "<div class='box-sin'> <div class='col-md-9 single-box'>";
            if($result != null){
                if (mysqli_num_rows($result) == 0){
                    echo "<center>No Result.</center>";
                }
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
                                                <th width='70%' ></th>
                                                <th width='20%'></th>
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
            }
            else {
                echo "<center>No Results.</center>";
            }
            echo "</div> </div>";
            ?>
        <div class="clearfix"> </div>
    </div>

</div>
<?php include ('public/footer.html') ?>
</body>
</html>