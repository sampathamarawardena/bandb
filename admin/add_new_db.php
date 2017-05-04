<?php
include ('dbConnect.php');

$Name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['pnumber'];
$city = $_POST['city'];
$town = $_POST['town'];
$noofrooms = $_POST['norooms'];
$noofbeds = $_POST['nobeds'];
$noofbathrooms = $_POST['nobath'];
$price = $_POST['price'];
$dis = $_POST['ed'];

echo $Name, "\n", $address,"\n", $phone,"\n", $city,"\n", $town,"\n", $noofrooms,"\n", $noofbeds,"\n", $noofbathrooms,"\n", $price,"\n, $dis";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO rentitems (Name, Phone, Address, City, Town, Rooms, Beds, Bathrooms, Price, Discription)
 VALUES ('$Name', '$phone', '$address', '$city', '$town', '$noofrooms', '$noofbeds', '$noofbathrooms', '$price', '$dis')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


