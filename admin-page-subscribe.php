<?php
session_start();
if ($_SESSION["login"] != "isset") {
    header("Location: admin-login.php");
}
if (isset($_POST["exit"])) {
    session_unset();
    header("Location: admin-login.php");
}
include "connection.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id, email,datetime FROM subscribe";
$result = mysqli_query($conn, $sql);
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
    <section class="subscribe">
        <div class="title">
            Subscribe
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Date/Time</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["datetime"] . "</td>";
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </section>
</body>

</html>