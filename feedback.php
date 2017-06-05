<?php
include ('public/header.php');

session_start();

if(isset($_SESSION['email']))
{
    $ema = $_SESSION['email'];

    include 'dbConnect.php';
    include('public/headerline2.php');

    if(isset($_POST['giveFeedback'])){


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
                <div class="container">
                    <h3>Feedback</h3>
                    <div class="feedback-top">
                        <form name="giveFeedback" action="feedback.php" method="post">
                            <input type="text"  placeholder="Name"  required="">
                            <textarea  placeholder="Feedback" requried=""></textarea>
                            <label class="hvr-sweep-to-right">
                                <input type="submit" name="giveFeedback" value="Send Feedback">
                            </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    <?php
} }
else{
    include ('public/headerline.php');
}
include ('public/footer.html');
