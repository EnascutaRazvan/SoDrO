<?php
 session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($user_data){
    echo "Hello ".$user_data['username'];
}

else
{
    header("Location: register.php");
    die;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title>SoDrO</title>
    <script src="assets/scripts/anychart-core.min.js"></script>
    <script src="assets/scripts/statistics-pie.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/icons/css/font-awesome.min.css">
</head>

<body>

    <section id="header">
        <a href="#"><img class="logo" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="drinks.php">Drinks</a></li>
                <li><a class="active" href="statistics.php">Statistics</a></li>
                <li><a href="about-us.php">About-us</a></li>
                <a href="register.php" class="signIn">Sign in</a>
            </ul>
        </div>
        <div id="mobile">
            <script src="assets/scripts/menu.js"></script>
            <i id="bar" class="fa fa-list-ul fa-lg" aria-hidden="true" onclick="menu()"></i>
        </div>
    </section>
    <section id="statistics">
        <h1>STATISTICS</h1>
        <div id="statistics-pie"></div>
        <div id="statistics-pie-mobile"></div>
        <hr>
        <h3>Download the <span style="font-family:default">data</span></h3>
        <h3><span style="display: inline-block;
            margin-left: 130px;"></span>In two different <span style="font-family:default">formats</span></h3>

        <div id="SVGorCSV">
            <a href="Register.html" class="statistics-button">SVG</a>
            <a href="Register.html" class="statistics-button">CSV</a>
        </div>

    </section>


    <script>


    </script>

    <footer class="section-p1">
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png"
                    alt="SoDrO Logo"></a>
        </div>
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png"
                    alt="SoDrO Logo"></a>
        </div>
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png"
                    alt="SoDrO Logo"></a>
        </div>

    </footer>


</body>