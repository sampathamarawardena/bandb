<?php
include ('header.php');
session_start();

if(isset($_SESSION['email']))
{
    $ema = $_SESSION['email'];

    include 'dbConnect.php';
    include('headerline2.php');

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




        ?>

        <div class="container">
            <div class="feedback">
                <div class="container">
                    <h3>Thank you for your Feedback </h3>
                </div>
            </div>
        </div>


        <?php
    }
    else{
        ?>
        <div>
            <div class="container">
                <div class="feedback">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Add New Rent Property</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form" METHOD="post" ACTION="addnewItem.php" enctype="multipart/form-data">
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
                                                <strong class="box-title">Add Images
                                                    <small> only add rent property images </small>
                                                </strong>
                                            </div>
                                            <br>
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
                                            <br>
                                            <div class="form-group">
                                                <div class="box-header">
                                                    <strong class="box-title">Description
                                                        <small>add small description about your property and more images</small>
                                                    </strong>
                                                </div>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body pad">
                                        <textarea id="editor1" name="ed" rows="10" cols="80">
                                        </textarea>
                                                <br>
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
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <?php
    } }
else{
    include ('headerline.php');
}
 include('scriptimports.php');
include ('../public/footer.html');
