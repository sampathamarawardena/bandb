<?php
include ('public/header.php');

session_start();

if(isset($_SESSION['email']))
{
    $ema = $_SESSION['email'];

    include 'dbConnect.php';
    include('public/headerline2.php');

    $sql = "SELECT * from users WHERE email='$ema'";
    if($conn->query($sql) == TRUE){
        $dbid = mysqli_query($conn, $sql);
        while ($row = $dbid->fetch_assoc()){
            $Fname = $row['Fname'];
            $Lname = $row['Lname'];
            $email = $row['email'];
            $mobile = $row['Phone'];
            $address = $row['Address'];
            $city = $row['City'];
            $uid = $row['userID'];
            $utype = $row['type'];
        }
    }
    ?>
    <div>
        <div class="container">
            <?php if ($utype == "Renter"){ ?>
                <div id="form1" class="form1">
                    <div style="margin-top: 50px" ></div>
                    <div style="margin-top: 20px" ></div>
                    <a href="admin/addnewItem.php"> <button type="button" class="btn btn-success">Add New Room For Rent</button> </a>
                </div>
                <div id="fomr4" class="form4">
                    <div style="margin-top: 50px" ></div>
                    <h3> My Rooms for Rent</h3>
                    <div class='form-info'>
                        <table class="table table-condensed">
                            <tr class="success">
                                <td> # </td>
                                <td> Name </td>
                                <td> Rooms </td>
                                <td> Beds </td>
                                <td> BathRooms </td>
                                <td> Price </td>
                                <td> Tools </td>
                            </tr>

                            <?php
                            $rentItems = "SELECT * FROM rentitems WHERE renterID = '$uid' ";
                            if($conn->query($rentItems) == TRUE){
                                $rents = mysqli_query($conn, $rentItems);
                                while ($ress = $rents->fetch_assoc()){
                                    $ID = $ress['itemID'];
                                    $Name = $ress['Name'];
                                    $Rooms = $ress['Rooms'];
                                    $Beds = $ress['Beds'];
                                    $BathRooms = $ress['Bathrooms'];
                                    $Price = $ress['Price'];
                                    echo "<tr>";
                                    echo "<td> $ID </td>";
                                    echo "<td> $Name </td>";
                                    echo "<td> $Rooms </td>";
                                    echo "<td> $Beds </td>";
                                    echo "<td> $BathRooms </td>";
                                    echo "<td> $Price </td>";
                                    echo "<td>";
                                    echo " <div >
                                                <label class='hvr-sweep-to-right'> <input type='submit' value='Cansel'> </label>
                                                </div>
                                        </td> 
                                    </tr>";
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>

                <div id="fomr5" class="form5">
                    <div style="margin-top: 50px" ></div>
                    <h3> Reservations </h3>
                    <div class='form-info'>
                        <table class="table table-condensed">
                            <tr class="success">
                                <td> # </td>
                                <td> Name </td>
                                <td> Rooms </td>
                                <td> Beds </td>
                                <td> BathRooms </td>
                                <td> Price </td>
                                <td> Tools </td>
                            </tr>

                            <?php
                            $reser =  "SELECT * 
                                           FROM bookings b, rentitems a
                                           WHERE b.itemID = a.itemID AND a.renterID = $uid";
                            if($conn->query($reser) == TRUE){
                                $rese = mysqli_query($conn, $reser);
                                while ($ress = $rese->fetch_assoc()){
                                    $ID = $ress['itemID'];
                                    $Name = $ress['Name'];
                                    $Rooms = $ress['Rooms'];
                                    $Beds = $ress['Beds'];
                                    $BathRooms = $ress['Bathrooms'];
                                    $Price = $ress['Price'];
                                    echo "<tr>";
                                    echo "<td> $ID </td>";
                                    echo "<td> $Name </td>";
                                    echo "<td> $Rooms </td>";
                                    echo "<td> $Beds </td>";
                                    echo "<td> $BathRooms </td>";
                                    echo "<td> $Price </td>";
                                    echo "<td>";
                                    echo " <div >
                                                <label class='hvr-sweep-to-right'> <input type='submit' value='Cansel'> </label>
                                                </div>
                                        </td> 
                                    </tr>";
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>

            <?php } ?>
            <div id="form2" class="form2">
                <div style="margin-top: 50px" ></div>
                <h3> My Profile details </h3>
                <div style="margin-top: 50px" ></div>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-3">
                            <?php echo "<input type='text' name='Fname' class='form-control' id='inputEmail3' value='$Fname'>" ?>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-3">
                            <?php echo "<input type='text' name='Lname' class='form-control' id='inputEmail3' value='$Lname'>" ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-2">
                            <?php echo "<input type='tel' name='phone' class='form-control' id='inputEmail3' value='$mobile'>" ?>
                        </div>
                        <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <?php echo "<input type='text' name='email' class='form-control' id='inputEmail3' value='$email'>" ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8">
                            <?php echo "<input type='text' name='address' class='form-control' id='inputEmail3' value='$address , $city'>" ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="form-info">
                                <label style="width: 80%"  class="hvr-sweep-to-right">
                                    <input type="submit" value="Save">
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="fomr3" class="form3">
                <div style="margin-top: 50px" ></div>
                <h3> My Bookings</h3>
                <div class='form-info'>
                    <table class="table table-condensed">
                        <tr class="success">
                            <td> # </td>
                            <td> Booking ID </td>
                            <td> Rooms </td>
                            <td> From </td>
                            <td> To </td>
                            <td> Tools </td>
                        </tr>

                        <?php
                        $bookings = "SELECT * FROM `bookings` WHERE userID = '$uid' ";
                        if($conn->query($bookings) == TRUE){
                            $bk = mysqli_query($conn, $bookings);
                            while ($res = $bk->fetch_assoc()){
                                $ID = $res['id'];
                                $rentID = $res['itemID'];
                                $rooms = $res['rooms'];
                                $bookFrom = $res['BookFrom'];
                                $bookTo = $res['BookTo'];
                                echo "<tr>";
                                echo "<td> $ID </td>";
                                echo "<td> $rentID </td>";
                                echo "<td> $rooms </td>";
                                echo "<td> $bookFrom </td>";
                                echo "<td> $bookTo </td>";
                                echo "<td>";
                                $date = date("Y-m-d");
                                if ($bookFrom > $date) {
                                    echo " <div >
                                                <label style='color: #1b7e5a' class='hvr-sweep-to-right'> <input type='submit' value='Cansel Booking'> </label>
                                                </div>
                                        </td> 
                                    </tr>";
                                }
                                elseif ($bookTo <= $date){
                                    echo " <div >
                                                <a href='index.php?itemId=$ID'>
                                                <label style='color: #1b7e5a' class='hvr-sweep-to-right'><input type='submit' value='Give a Feedback'> </label>
                                                </a></div>
                                        </td> 
                                    </tr>";
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="./js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <?php
}
else{
    include ('public/headerline.php');
}
include ('public/footer.html');
