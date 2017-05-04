<!DOCTYPE html>
<html>
<body>
<?php
include('dbConnect.php');
?>

<div class="container">
    <!--price-->
    <div class="price">
        <div class="price-grid">
            <div class="col-sm-4 price-top">
                <h4>City</h4>
                <select class="in-drop">
                    <option>Select City</option>
                    <?php
                        $sql2 = "SELECT `City` FROM `rentitems` GROUP BY `City` ORDER BY `rentitems`.`City` ASC";
                        $result = mysqli_query($conn, $sql2);
                        while ($r = mysqli_fetch_array($result)) {
                            $cityName = $r['City'];
                            echo "<option> ". $cityName ." </option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-4 price-top">
                <h4>Category</h4>
                <select class="in-drop">
                    <option>Select Category</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <div class="col-sm-4 price-top">
                <h4>Rooms</h4>
                <select class="in-drop">
                    <option>No. of Bedrooms</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>More than 5</option>
                </select>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="price-grid">
            <div class="col-sm-6 price-top1">
                <h4>Price Range</h4>
                <ul>
                    <li>
                        <select class="in-drop">
                            <option>Price From</option>
                            <option>0</option>
                            <option>10,000 LKR</option>
                            <option>20,000 LKR</option>
                            <option>30,000 LKR</option>
                            <option>40,000 LKR</option>
                        </select>
                    </li>
                    <span>-</span>
                    <li>
                        <select class="in-drop">
                            <option>Price To</option>
                            <option>10,000 LKR</option>
                            <option>20,000 LKR</option>
                            <option>30,000 LKR</option>
                            <option>40,000 LKR</option>
                            <option>50,000 LKR</option>
                        </select>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <center>
            <div class="contact-right">
                <label class="hvr-sweep-to-right">
                    <input type="submit" value="Search">
                </label>
            </div>
        </center>
    </div>
</div>
</body>
</html>