<?php
session_start();
include "connection.php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include "visit-our-products.php";
$sql = "UPDATE visit SET today_visit='$today_visit',yesterday_visit='$yesterday_visit',
week_visit='$week_visit',month_visit='$month_visit',total_visit='$total_visit',online='$online' WHERE page_name='our_products'";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lio | our products</title>
    <meta charset="UTF-8">
    <meta name="description" content="Like many major industrial manufacturers in the world, Liu's company has goals such as customer satisfaction, quality control in all stages of production and quality improvement on its agenda.
    Liu's whole effort is to acquire the latest knowledge and technology in the world and provide the highest quality in competition with other global products and to have an honest and committed relationship with the customer.">
    <meta name="keyword" content="lio,liofood,food,grocery,Saffron,liofoodgrocery">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/our-products.css" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/308dd81219.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "header.php" ?>
    <main id="main">
        <div class="our-products-container">
            <h1>OUR PRODUCTS</h1>
            <h2 style="color:#800080;">Saffron</h2>
            <div class="imagelist">
                <img id="img1" onclick="modalimg(this)" src="images/i1.jpeg" style="width:100%;max-width:100px">
                <img id="img2" onclick="modalimg(this)" src="images/i2.jpeg" style="width:100%;max-width:100px">
                <img id="img3" onclick="modalimg(this)" src="images/i3.jpeg" style="width:100%;max-width:100px">
                <img id="img4" onclick="modalimg(this)" src="images/i4.jpeg" style="width:100%;max-width:100px">
                <img id="img5" onclick="modalimg(this)" src="images/i5.jpeg" style="width:100%;max-width:100px">
                <div id="myModalimg" class="modalimg">
                    <span class="closeimg">&times;</span>
                    <img class="modal-content-img" id="img">
                </div>
                <script>
                    function modalimg(p) {
                        myModalimg.style.display = "block";
                        img.src = p.src;
                    }
                    var span = document.getElementsByClassName("closeimg")[0];
                    span.onclick = function() {
                        myModalimg.style.display = "none";
                    }
                </script>
            </div>
            <div class="tab-container">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'London')" id="Open">Description</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Benefits</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Nutrition</button>
                </div>
                <div id="London" class="tabcontent">
                    <p>
                        Aromatic strands of crocus sativus Saffron has been cultivated for more than millenniums in Iran and is the strategic agricultural products of Iran , which more than %90 of world production of this Treasure of Spice, comes from hear every year. Saffron which is also known as Red flower is used as a natural coloring & aromatic in foods, pastries, beverages, pharmaceutical, etc. Medical searches proved that consuming of 3 grams saffron every month is caused refreshing mentally and physically
                    </p>
                    <h3>Types of saffron</h3>
                    <p>1- Bunch saffron<br>
                        2- Pushal saffron<br>
                        3- Sargol saffron<br>
                        4- Negin Pushal saffron or pushal Negin<br>
                        5- Konge saffron or white saffron<br><br>
                        <b>1- Bunch saffron</b><br>
                        It is the main and most basic type of saffron and it is obtained by stacking and drying it together, which includes (stigma and raw).<br>
                        The style portion is usually 3 to 5 (mm) And the stigma depends on the quality of saffron, longer or shorter.<br><br>
                        <b>2- Pushal saffron</b><br>
                        In pushal saffron, the red stigma part of the saffron string with 1 to 3 (mm) is more yellow than the style part and has more coloring power than the bunch saffron and the coloring power of pushal saffron is 25 to 170.<br><br>
                        <b>3- Sargol saffron</b><br>
                        In this type of part, there is no style (root) and if the red stigmas are separated, it will form pure saffron.<br>
                        In addition to Sargol, the titles Sargalam, Sar rishe (root head) , and Mumtaz are used for this type of saffron.<br><br>
                        <b>4- Negin Pushal saffron or Pushal Negin</b><br>
                        Negin Pushal saffron is a pure type of Pushal saffron. In Negin Pushal saffron, three-pronged and thick of red stigma without yellow style part are separated from the existing fibers and prepared in thick saffron. The most luxurious and most expensive type of Saffron is the Negin pushal saffron.
                        And has the highest coloring power between 230 to 270 units.<br><br>
                        <b>5- Konge saffron or white saffron</b><br>
                        By separating Sargol saffron from the bunch, the root part of the saffron remains, which in Iran is called white and Konge saffron.
                        Despite to what people believe that konge has more perfume than sargol. Konge is not included in the classification of saffron types, but it is considered because of its beautiful color and appearance and there is no possibility of cheating.

                    </p>
                    <div class="des-content">
                        <div>
                            <table class="tb1">
                                <tr>
                                    <td>Product</td>
                                    <td>Saffron</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>Super Negin.Negin.sargol.</td>
                                </tr>
                                <tr>
                                    <td>Style</td>
                                    <td>Dried</td>
                                </tr>
                                <tr>
                                    <td>Form</td>
                                    <td>Filaments</td>
                                </tr>
                                <tr>
                                    <td>Color</td>
                                    <td>All Red</td>
                                </tr>
                                <tr>
                                    <td>Part</td>
                                    <td>Only Dried Stigmas</td>
                                </tr>
                                <tr>
                                    <td>Place of Origin</td>
                                    <td>Iran</td>
                                </tr>
                                <tr>
                                    <td>Brand Name</td>
                                    <td>Lio safrron</td>
                                </tr>
                                <tr>
                                    <td>Source of Saffron</td>
                                    <td>Iran, Ferdows</td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td>Minimum 1kg</td>
                                </tr>
                                <tr>
                                    <td>Packing</td>
                                    <td>sargol saffron: 2 gr net in a glass container inside the box<br>
                                        Negin saffron: 3gr net in a glass container inside the box
                                    </td>
                                </tr>
                                <tr>
                                    <td>Delivery time</td>
                                    <td>10 days after Order Confirmed</td>
                                </tr>
                                <tr>
                                    <td>Shelf Life</td>
                                    <td>24 months</td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <div style="text-align:center;"><img src="images/saff1.jpg" alt="" width="100"></div><br>
                            <div style="text-align:center;"><img src="images/saff2.jpg" alt="" width="100"></div>
                        </div>
                    </div>
                </div>
                <div id="Paris" class="tabcontent">
                    <br>
                    <br>
                </div>
                <div id="Tokyo" class="tabcontent">
                    <h3>NUTRITION FACTS</h3>
                    <div class="des-content">
                        <div>
                            <table>
                                <tr>
                                    <th>Principle</th>
                                    <th>Nutrient Value/100g</th>
                                    <th>Unit</th>
                                </tr>
                                <tr>
                                    <td>Energy</td>
                                    <td>310 Kcal</td>
                                    <td>3.1 Kcal</td>
                                </tr>
                                <tr>
                                    <td>Carbohydrates</td>
                                    <td>65.37 g</td>
                                    <td>0.65 g</td>
                                </tr>
                                <tr>
                                    <td>Protein</td>
                                    <td>11.43 g</td>
                                    <td>0.11 g</td>
                                </tr>
                                <tr>
                                    <td>Total Fat</td>
                                    <td>5.85 g</td>
                                    <td>0.05 g</td>
                                </tr>
                                <tr>
                                    <td>Cholesterol</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Dietary Fiber</td>
                                    <td>3.9 g</td>
                                    <td>0.03 g</td>
                                </tr>
                                <tr>
                                    <td>Sodium</td>
                                    <td>148 mg</td>
                                    <td>1.48 g</td>
                                </tr>
                                <tr>
                                    <td>Potassium</td>
                                    <td>1724 mg</td>
                                    <td>17.24 g</td>
                                </tr>
                                <tr>
                                    <td>Calcium</td>
                                    <td>111 mg</td>
                                    <td>1.11 g</td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <div style="text-align:center;"><img src="images/saff3.jpg" alt="" width="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "footer.php" ?>
    <script src="js/script.js "></script>
    <script>
        document.getElementById("Open").click();
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