<?php
session_start();
include "connection.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include "visit-about-us.php";
$sql = "UPDATE visit SET today_visit='$today_visit',yesterday_visit='$yesterday_visit',
week_visit='$week_visit',month_visit='$month_visit',total_visit='$total_visit',online='$online' WHERE page_name='about_us'";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Lio | about us</title>
    <meta charset="UTF-8">
    <meta name="description" content="Like many major industrial manufacturers in the world, Liu's company has goals such as customer satisfaction, quality control in all stages of production and quality improvement on its agenda.
    Liu's whole effort is to acquire the latest knowledge and technology in the world and provide the highest quality in competition with other global products and to have an honest and committed relationship with the customer.">
    <meta name="keyword" content="lio,liofood,food,grocery,Saffron,liofoodgrocery">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/about-us.css" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/308dd81219.js" crossorigin="anonymous"></script>
    </script>
</head>

<body>
    <?php include "header.php" ?>
    <main id="main">
        <div class="about-us-container">
            <h1>ABOUT US</h1>
            <div class="about-us">
                <div>
                    <p>
                        Like many major industrial manufacturers in the world, Liu's company has goals such as customer satisfaction, quality control in all stages of production and quality improvement on its agenda.<br><br>
                        Liu's whole effort is to acquire the latest knowledge and technology in the world and provide the highest quality in competition with other global products and to have an honest and committed relationship with the customer.<br><br>
                        We firmly believe that with the efforts of the Liu Group and with the vision of global markets, we will be very successful.<br><br>
                        We are committed.
                    </p>
                </div>
                <div>
                    <img src="images/logo.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <?php include "footer.php" ?>
    <script src="js/script.js "></script>
    <script>
        $(function() {
            $('#reload').click(function() {
                $('#captcha').attr('src', 'captcha.php?' + (new Date).getTime());
            });
        });
    </script>
</body>

</html>

<?php
include "connection.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST["subscribe"])) {
    if (!empty($_POST["email"])) {
        $email = $_POST["email"];
        date_default_timezone_set("Asia/Tehran");
        $datetime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO subscribe (email, datetime)
        VALUES ('$email','$datetime')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>info_open('&#10003; Data sent', true);</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>