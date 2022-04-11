<?php
session_start();
include "connection.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include "visit-home.php";
$sql = "UPDATE visit SET today_visit='$today_visit',yesterday_visit='$yesterday_visit',
week_visit='$week_visit',month_visit='$month_visit',total_visit='$total_visit',online='$online' WHERE page_name='home'";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lio | Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="Like many major industrial manufacturers in the world, Liu's company has goals such as customer satisfaction, quality control in all stages of production and quality improvement on its agenda.
    Liu's whole effort is to acquire the latest knowledge and technology in the world and provide the highest quality in competition with other global products and to have an honest and committed relationship with the customer.">
    <meta name="keyword" content="lio,liofood,food,grocery,Saffron,liofoodgrocery">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://kit.fontawesome.com/308dd81219.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    <main>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/saffron5.jpg" alt="saffron" style="width:100%">
                <div class="text">
                    <div class="title-text">
                        We grow your business with quality lio products
                    </div>
                </div>
            </div>
            <div class="mySlides fade">
                <img src="images/saffron1.jpg" alt="saffron" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="images/saffron2.jpg" alt="saffron" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="images/saffron3.jpg" alt="saffron" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img src="images/saffron4.jpg" alt="saffron" style="width:100%">
            </div>
            <div style="text-align:center" class="dot-container">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
        <div class="main-container">
            <section class="row" id="row1">
                <div id="row11">
                    <h1>Custom packaging</h1>
                    <p>
                        Lio team allows you dear customers, to choose and design your packaging based on your interests. Also, you can choose the type of packaging material and name, logo, address or anything else that suits your needs. Print.
                        You can introduce your brand to the world with Lio.
                    </p>
                </div>
                <div id="row12">
                    <img src="images/pakage.jpeg" alt="pakage">
                </div>
            </section>
            <div class="main-sec">
                <section class="row" id="row2">
                    <div id="row21">
                        <h1>Supply of Lio products in packaged form</h1>
                    </div>
                    <div id="row22">
                        <img src="images/img2.jpg" alt="pakage">
                    </div>
                </section>
                <section class="row" id="row3">
                    <div id=row31>
                        <h1>Lio products in bulk</h1>
                    </div>
                    <div id=row32>
                        <img src="images/img1.jpg" alt="pakage">
                    </div>
                </section>
            </div>
        </div>
    </main>
    <?php include "footer.php" ?>
    <script src="js/script.js"></script>
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