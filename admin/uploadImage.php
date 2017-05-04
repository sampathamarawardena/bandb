<?php
/**
 * Created by PhpStorm.
 * User: SASOFT
 * Date: 4/10/2017
 * Time: 10:13 PM
 *
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bandb";
$msg = "";
    if (isset($_POST['upload'])) {
        for ($i = 1; $i <3; $i++ ) {
            echo "image_".$i;
            $db = mysqli_connect($servername, $username, $password, $dbname);
            $text = $_POST['text'];
            try {
                $target_dir = "image/";
                $target_file = $target_dir . $i . "_" .basename($_FILES["image_".$i]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $check = getimagesize($_FILES["image_".$i]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                    if (move_uploaded_file($_FILES["image_".$i]["tmp_name"], $target_file)) {
                        try{
                            $sql = "INSERT INTO images (ImageLink, name) VALUE ('$target_file', '$text')";
                            mysqli_query($db, $sql);
                            echo 'Connected to database';
                            echo "The file " . basename($_FILES["image_".$i]["name"]) . " has been uploaded.";
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
    }
?>

<!DOCTYPE html>
<html>
 <boda>
        <div>
            <form method="post" action="uploadImage.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="file" name="image_1">
                    <input type="file" name="image_2">
                </div>
                <div>
                    <textarea name="text" cols="10" rows="10" placeholder="hi"></textarea>
                </div>
                <div>
                    <input type="submit" name="upload" value="upload Image">
                </div>
            </form>
        </div>
 </boda>
</html>
