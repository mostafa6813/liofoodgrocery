<?php
session_start();
include "connection.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include "visit-customer-care.php";
$sql = "UPDATE visit SET today_visit='$today_visit',yesterday_visit='$yesterday_visit',
week_visit='$week_visit',month_visit='$month_visit',total_visit='$total_visit',online='$online' WHERE page_name='customer_care'";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lio | Customer care</title>
    <meta charset="UTF-8">
    <meta name="description" content="Like many major industrial manufacturers in the world, Liu's company has goals such as customer satisfaction, quality control in all stages of production and quality improvement on its agenda.
    Liu's whole effort is to acquire the latest knowledge and technology in the world and provide the highest quality in competition with other global products and to have an honest and committed relationship with the customer.">
    <meta name="keyword" content="lio,liofood,food,grocery,Saffron,liofoodgrocery">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/customer-care.css" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/308dd81219.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    <main>
        <div class="customer-care-container">
            <div>
                <h1>CUSTOMER CARE</h1>
                <P>Lio Team is ready to respond 24/7 if you have any questions, inquiries, samples or anything you may need from us. We value you and your feedback is important to us. The whole Lio team is at your disposal to meet your needs. We are committed.</P>
            </div>
            <div class="customer-care-form">
                <form action="customer-care.php" method="post">
                    <label>Name:</label>
                    <input type="text" name="name" value="" required>
                    <label>Company name:</label>
                    <input type="text" name="company_name" value="">
                    <label>Social network:</label>
                    <select name="social_network">
                        <option value="none">None</option>
                        <option value="linkedin">linkedin</option>
                        <option value="whatsapp">Whatsapp</option>
                        <option value="whatsapp">Instagram</option>
                    </select>
                    <label>Tel NO:</label>
                    <input type="text" name="tel_no" value="" required>
                    <label>Email:</label>
                    <input type="email" name="email" value="" required>
                    <label>Message:</label>
                    <textarea name="message" required></textarea>
                    <div class="captcha" style="display: flex;align-items: center;">
                        <span style="width:150px;height:40px;display:inline-block"><img src="captcha.php" alt="captcha" width="100%" height="100%" id="captcha"></span>
                        <span style="display: inline-block;cursor: pointer;padding: 2px;"><img src="images/refresh.png" alt="refresh" id="reload" width="25"></span>
                    </div>
                    <input type="text" name="text" value="" placeholder="Captcha code" autocomplete="off" required>
                    <input type="submit" name="submit" value="Submit">
                </form>
                <div class="customer-care-image">
                    <img src="images/customer-care.png" alt="customer-care">
                </div>
            </div>
        </div>
    </main>
    <?php include "footer.php" ?>
    <script src="js/script.js"></script>
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
if (isset($_POST["submit"])) {
    if (!empty($_POST["text"])) {
        if ($_POST["text"] == $_SESSION["code"]) {
            $name = $_POST["name"];
            $company_name = $_POST["company_name"];
            $social_network = $_POST["social_network"];
            $tel_no = $_POST["tel_no"];
            $email = $_POST["email"];
            $message = $_POST["message"];
            date_default_timezone_set("Asia/Tehran");
            $datetime = date("Y-m-d H:i:s");
            $sql = "INSERT INTO customer_care (name,company_name,social_network,tel_no, email, message, datetime)
        VALUES ('$name','$company_name','$social_network','$tel_no','$email', '$message','$datetime')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>info_open('&#10003; Data sent', true);</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script>info_open('&#935; Captcha incorrect', false);</script>";
        }
    }
}
mysqli_close($conn);
?>