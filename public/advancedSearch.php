<!DOCTYPE html>
<html>
<body>
<?php
include('dbConnect.php');
?>
<div class="container">
    <div class="price">
        <form name="advSearch" action="./searchResult.php">
            <div class="price-grid">
                <div class="col-sm-3 price-top">
                    <h4>City</h4>
                    <select name="serCity" class="in-drop">
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
                <div class="col-sm-3 price-top">
                    <h4>Rooms</h4>
                    <select name="NoRooms" class="in-drop">
                        <option>No. of Bedrooms</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>
                <div class="col-sm-6 price-top1">
                    <h4>Price Range</h4>
                    <ul>
                        <li>
                            <select name="PriceFrom" class="in-drop">
                                <option>Price From</option>
                                <option>0</option>
                                <option>10000</option>
                                <option>20000</option>
                                <option>30000</option>
                                <option>40000</option>
                            </select>
                        </li>
                        <span>-</span>
                        <li>
                            <select name="PriceTo" class="in-drop">
                                <option>Price To</option>
                                <option>10000</option>
                                <option>20000</option>
                                <option>30000</option>
                                <option>40000</option>
                                <option>50000</option>
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
        </form>
    </div>
</div>
</body>
</html>