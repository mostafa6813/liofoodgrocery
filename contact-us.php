<?php
session_start();
include "connection.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include "visit-contact-us.php";
$sql = "UPDATE visit SET today_visit='$today_visit',yesterday_visit='$yesterday_visit',
week_visit='$week_visit',month_visit='$month_visit',total_visit='$total_visit',online='$online' WHERE page_name='contact_us'";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Lio | contact us</title>
    <meta charset="UTF-8">
    <meta name="description" content="Like many major industrial manufacturers in the world, Liu's company has goals such as customer satisfaction, quality control in all stages of production and quality improvement on its agenda.
    Liu's whole effort is to acquire the latest knowledge and technology in the world and provide the highest quality in competition with other global products and to have an honest and committed relationship with the customer.">
    <meta name="keyword" content="lio,liofood,food,grocery,Saffron,liofoodgrocery">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/contact-us.css" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/308dd81219.js" crossorigin="anonymous"></script>
    </script>
</head>

<body>
    <?php include "header.php" ?>
    <main id="main">
        <div class="contact-us-container">
            <div class="contact-us-title">
                <h1>CONTACT US</h1>
                <p>
                    Please contact us if you have any questions or price inquiries. Lio team is ready to answer you 24/7
                </p>
            </div>
            <div class="contact-us">
                <div class="contact-item">
                    <div>
                        <div class="icon"><i class='fas fa-map-marker-alt'></i></div>
                    </div>
                    <div>Aghaghia Building, Navab Highway, Tehran, Iran</div>
                </div>
                <div class="contact-item">
                    <div>
                        <div class="icon"><i class='fas fa-envelope'></i></div>
                    </div>
                    <div><a href="mailto:info@liofoodgrocery.com" target="_blank"> info@liofoodgrocery.com</a></div>
                </div>
                <div class="contact-item">
                    <div>
                        <div class="icon"><i class='fas fa-phone'></i></div>
                    </div>
                    <div>+98(0)21 5543 5275</div>
                    <div>+98(0)912 431 4726</div>
                    <div>+98(0)917 625 1013</div>
                </div>
                <div class="contact-item">
                    <div>
                        <div class="icon"><i class='fab fa-whatsapp'></i></div>
                    </div>
                    <div><a href="https://wa.me/989379681676"  target="_blank">+98(0)937 968 1676</a></div>

                </div>
                <div class="contact-item">
                    <div>
                        <div class="icon"><i class='fab fa-instagram'></i></div>
                    </div>
                    <div><a href="https://www.instagram.com/p/CIiJ312FBHB/?igshid=5nos20738rzo"  target="_blank"> @liofoodgrocery</a></div>
                </div>
                <div class="contact-item">
                    <div>
                        <div class="icon"><i class='fab fa-linkedin'></i></div>
                    </div>
                    <div><a href="#"  target="_blank"> @liofoodgrocery</a></div>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8103661096466!2d51.37763691525876!3d35.681671080194214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQwJzU0LjAiTiA1McKwMjInNDcuNCJF!5e0!3m2!1sen!2s!4v1607590141860!5m2!1sen!2s" width="100%" height="300" frameborder="0" style="vertical-align: middle;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="contact-us-submit">
                <div style="padding: 20px 0;">Please fill out the quick form and we will be in touch with lightning speed.</div>
                <div class="section-form-image">
                    <form action="contact-us.php" method="post" class="contact-us-form">
                        <label>Name:</label>
                        <input type="text" name="name" value="" required>
                        <label>Email:</label>
                        <input type="email" name="email" value="" required>
                        <label>Message:</label>
                        <textarea name="message" required></textarea>
                        <div class="captcha" style="display: flex;align-items: center;">
                            <span style="width:150px;height:40px;display:inline-block"><img src="captcha.php" alt="captcha" width="100%" height="100%" id="captcha"></span>
                            <span style="display: inline-block;cursor: pointer;padding: 2px;"><img src="images/refresh.png" id="reload" alt="refresh" width="25"></span>
                        </div>
                        <input type="text" name="text" value="" autocomplete="off" placeholder="Captcha code" required>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                    <div class="contact-us-image">
                        <img src="images/contact-us.jpg" style="width:100%;border-radius:10px" alt="contact-us">
                    </div>
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
if (isset($_POST["submit"])) {
    if (!empty($_POST["text"])) {
        if ($_POST["text"] == $_SESSION["code"]) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $message = $_POST["message"];
            date_default_timezone_set("Asia/Tehran");
            $datetime = date("Y-m-d H:i:s");
            $sql = "INSERT INTO contact_us (name, email, message, datetime)
        VALUES ('$name', '$email', '$message','$datetime')";
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