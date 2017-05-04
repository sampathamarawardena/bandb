<?php
include ('dbConnect.php');

if (isset($_POST['upload'])){
    $Name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['pnumber'];
    $email = $_POST['email']; /* not set to db*/
    $city = $_POST['city'];
    $town = $_POST['town'];
    $noofrooms = $_POST['norooms'];
    $noofbeds = $_POST['nobeds'];
    $noofbathrooms = $_POST['nobath'];
    $price = $_POST['price'];
    $dis = $_POST['ed'];

    $itemID = 0;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO rentitems (Name, Phone, Address, City, Town, Rooms, Beds, Bathrooms, Price, Discription)
            VALUES ('$Name', '$phone', '$address', '$city', '$town', '$noofrooms', '$noofbeds', '$noofbathrooms', '$price', '$dis')";
    if ($conn->query($sql) === TRUE) {
        $sql2 = "SELECT * FROM rentitems WHERE Name='$Name' AND Phone='$phone'";
            if($conn->query($sql2) == TRUE){
                $dbid = mysqli_query($conn, $sql2);
                while ($row = $dbid->fetch_assoc()){
                    $itemID = $row["itemID"]; // getting last added item id
                }
                for ($i = 1; $i <5; $i++ ) {
                    try {
                        $target_dir = "image/";
                        $target_file = $target_dir . $i . "_" .basename($_FILES["file_".$i]["name"]);
                        $uploadOk = 1;
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        $check = getimagesize($_FILES["file_".$i]["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                            if (move_uploaded_file($_FILES["file_".$i]["tmp_name"], $target_file)) {
                                try{
                                    $sql = "INSERT INTO images (itemID, ImageLink, name) VALUE ('$itemID','$target_file', '$Name')";
                                    mysqli_query($conn, $sql);
                                    echo "Items ID IS ".$itemID;
                                }catch (Exception $exceptione){
                                    echo $exceptione;
                                }
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                    } catch (exception $e) {
                        echo $e;
                    }
                }
                // end of image adding
            }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include ('importFiles.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include ('menuitems.php') ?>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                </div>
            </div>
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="index.php"> <i class="fa fa-dashboard"></i> <span>Home</span></a>
                </li>
                <li class="active treeview">
                    <a href="addNew.php"> <i class="fa fa-download"></i><span>Add New</span></a>
                </li>
                <li>
                    <a href="accountSummery.php"><i class="fa fa-bank"></i> <span>Account Summery</span>
                        <span class="pull-right-container">
                                <small class="label pull-right bg-aqua">17</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="rentItems.php"><i class="fa fa-trophy"></i> <span>Rent items</span>
                        <span class="pull-right-container">
                                <small class="label pull-right bg-red">3</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="bookings.php"><i class="fa fa-flag-checkered"></i> <span>Bookings</span>
                        <span class="pull-right-container">
                                <small class="label pull-right bg-red">3</small>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-unlock"></i> <span> Admin Options </span><span class="pull-right-container"><i class="fa fa-angle-down pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=""><i class="fa fa-circle-o"></i> User Management</a></li>
                        <li><a href=""><i class="fa fa-circle-o"></i> All Bookings </a></li>
                        <li><a href=""><i class="fa fa-circle-o"></i> Reports </a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Rent Property</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" METHOD="post" ACTION="addNew.php" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group pad+">
                                    <label for="exampleInputEmail1">Enter Name for Property</label>
                                    <input class="form-control input-lg" type="text" name="name" placeholder="Name">
                                </div>
                                <div class="form-group pad">
                                    <table style="width: 100%">
                                        <td>
                                            <div class="width: 200px">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input class="form-control" type="text" name="address" placeholder="Address">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="width: 200px">
                                                <label for="exampleInputEmail1">City</label>
                                                <select class="form-control select2" name="city" style="width: 100%;">
                                                    <option selected="selected">Select City</option>
                                                    <?php
                                                    $citSql = "SELECT * FROM `cities` ORDER BY `cities`.`name_en` ASC";
                                                    $result = mysqli_query($conn, $citSql) or die("Query fail: " . mysqli_error());
                                                    while ($r = mysqli_fetch_array($result)){
                                                        $cit_en = $r['name_en'];
                                                        echo "<option>$cit_en</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="width: 200px">
                                                <label for="exampleInputEmail1">Town</label>
                                                <select class="form-control select2" name="town" style="width: 100%;">
                                                    <option selected="selected">Select Town</option>
                                                        <?php
                                                        $citSql = "SELECT * FROM `cities` ORDER BY `cities`.`name_en` ASC";
                                                        $result = mysqli_query($conn, $citSql) or die("Query fail: " . mysqli_error());
                                                        while ($r = mysqli_fetch_array($result)){
                                                            $cit_en = $r['name_en'];
                                                            echo "<option>$cit_en</option>";
                                                        }

                                                        ?>
                                                </select>
                                            </div>
                                        </td>
                                    </table>
                                    <br>
                                    <table width="100%" class="pad">
                                        <td>
                                            <div style="width: 250px">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No of Rooms</label>
                                                    <input class="form-control" type="text" name="norooms" placeholder="Rooms">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width: 250px">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No of Beds</label>
                                                    <input class="form-control" type="text" name="nobeds" placeholder="Beds">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width: 250px">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No of Bathrooms</label>
                                                    <input class="form-control" type="text" name="nobath" placeholder="Bathrooms">
                                                </div>
                                            </div>
                                        </td>
                                    </table>
                                </div>
                                <div class="form-group pad">
                                    <div style="width: 30%">
                                        <label for="eampleInputEmail1">Phone Number</label>
                                        <input class="form-control" type="tel" name="pnumber" placeholder="Phone Number">
                                    </div>
                                    <div style="width: 30%">
                                        <label for="exampleInputEmail"> Email </label>
                                        <input class="form-control" type="email" name="email" placeholder="example@band.com">
                                    </div>
                                </div>
                                <div style="width: 200px">
                                    <div class="form-group pad">
                                        <label for="exampleInputEmail1">Price for one day</label>
                                        <input class="form-control" type="text" name="price" placeholder="Price">
                                    </div>
                                </div>
                                <div class="box-header">
                                    <h3 class="box-title">Add Images
                                        <small> only add rent property images </small>
                                    </h3>
                                </div>
                                <div class="form-group pad">
                                    <div class="col-md-3"><input type="file" name="file_1"></div>
                                </div>
                                <div class="form-group pad">
                                    <div class="col-md-3"><input type="file" name="file_2"></div>
                                </div>
                                <div class="form-group pad">
                                    <div class="col-md-3"><input type="file" name="file_3"></div>
                                </div>
                                <div class="form-group pad">
                                    <div class="col-md-3">
                                            <input type="file" name="file_4">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="box-header">
                                        <h3 class="box-title">Description
                                            <small>add small description about your property and more images</small>
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                        <textarea id="editor1" name="ed" rows="10" cols="80">
                                        </textarea>
                                    <br>
                                    <!-- /.text area end -->
                                </div>
                                <div style="text-align: center ;" class="box-pane-right box-body pad">
                                    <button type="submit" name="upload" style="width: 250px; height: 50px; align-content: center " class="btn btn-primary">Rent Property</button>
                                    <button type="submit" style="width: 250px; height: 50px; align-content: center " class="btn btn-danger">Clear All</button>
                                </div>
                        </form>
                        <br>
                    </div>
                    <br><br><br><br>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <?php include ('scriptimports.php');?>
</div>
</body>
</html>