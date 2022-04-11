<?php
session_start();
if ($_SESSION["login"] != "isset") {
    header("Location: admin-login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-admin.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>lio | Admin page</title>
    <style>

    </style>
</head>

<body>
    <section class="header">
        Admin page
    </section>
    <section class="nav">
        <ul>
            <li><a href="admin-page.php">Site visit</a></li>
            <li><a href="admin-page-subscribe.php">Subscribe</a></li>
            <li><a href="admin-page-contact-us.php">Contact us</a></li>
            <li><a href="admin-page-customer-care.php">Customer care</a></li>
            <li><a href="admin-page-change-password.php">Change password</a></li>
        </ul>
        <form class="exit" action="admin-page.php" method="post">
            <input id="iexit" type="submit" name="exit" value="Exit">
        </form>
    </section>
    <section class="change-password">
        <div class="title">
            Change password
        </div>
        <div class="form-container">
            <div>Username: <b>admin</b></div>
            <div id="info"></div>
            <form action="" method="post">
                <label for="">Enter password:</label>
                <input type="password" name="pass1">
                <label for="">Enter confirm password:</label>
                <input type="password" name="pass2">
                <input type="submit" name="change" value="Change password">
            </form>
        </div>
    </section>
</body>

</html>

<?php
if (isset($_POST["change"])) {
    include "connection.php";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (!empty($_POST["pass1"]) && !empty($_POST["pass2"]) && $_POST["pass1"] == $_POST["pass2"]) {
        $password = $_POST["pass1"];
        $sql = "UPDATE users SET password='$password' WHERE username='admin'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
            document.getElementById('info').innerHTML = 'Password changed';
            document.getElementById('info').style.display = 'block';
            document.getElementById('info').style.backgroundColor = 'green';
            </script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "<script>
        document.getElementById('info').innerHTML = 'Not match password';
        document.getElementById('info').style.display='block';
        document.getElementById('info').style.backgroundColor='red';
        </script>";
    }
}
?>