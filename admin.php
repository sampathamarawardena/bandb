<?php
include ('public/header.php');

session_start();

if(isset($_SESSION['email']))
{
$ema = $_SESSION['email'];

include 'dbConnect.php';
include('public/headerline2.php');

$sql = "SELECT * from users WHERE username='$ema'";
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
    }
}
?>
<div>
    <div class="container">
        <div class="form1">
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
        <div class="form1">
            <div style="margin-top: 50px" ></div>
            <h3> My Bookings</h3>
            <div class='form-info'>
                <table class="table table-condensed">
                    <tr class="success">
                        <td> # </td>
                        <td> Booking ID </td>
                        <td> User ID </td>
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
                            $userID = $res['rooms'];
                            $bookFrom = $res['BookFrom'];
                            $bookTo = $res['BookTo'];
                            echo "<tr>";
                            echo "<td> $ID </td>";
                            echo "<td> $rentID </td>";
                            echo "<td> $userID </td>";
                            echo "<td> $bookFrom </td>";
                            echo "<td> $bookTo </td>";
                            echo "<td>";
                            echo " <div >
                                                <label class='hvr-sweep-to-right'> <input type='submit' value='Cansel Booking'> </label>
                                                </div>
                                        </td> 
                                    </tr>";
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
