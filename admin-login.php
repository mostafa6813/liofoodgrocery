<?php
session_start();
if (!empty($_SESSION["login"]) && $_SESSION["login"] == "isset") {
    header("Location: admin-page.php");
}
include "connection.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST["login"])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT  username,password FROM users WHERE username='$username' && password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION["login"]="isset";
            header("Location: admin-page.php");
          } else {
            echo "<div style='color:red;text-align:center'>Invalid username or password</div>";
          }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>Lio | Admin login</title>
    <style>
        @charset "UTF-8";
        @import url('https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Chivo, Verdana, sans-serif;
        }

        .form-container {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            max-width: 500px;
            padding: 10px;
            box-shadow: 0 0 5px #bbb;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 8px;
            background-color: initial;
        }

        input[type="submit"] {
            background-color: #800080;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #660166;
        }

        input[type="submit"]:active {
            background-color: #350035;
        }

        h1 {
            padding: 20px 0;
            margin: 0;
            background-color: #eee;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="admin-login.php" method="post">
            <h1 style="text-align:center;background-color:#eee">Admin login</h1>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Login" name="login">
        </form>
    </div>
</body>

</html>
