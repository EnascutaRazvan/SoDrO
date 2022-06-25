
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title>SoDrO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/icons/css/font-awesome.min.css">
    <script src="script.js"></script>
</head>


<?php

session_start();

include("connection.php");
include("functions.php");
$database = new connectionDB("localhost","root","","sodrodatabase");
$user_data = check_login($database->con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['logoutbutton'])) {
        session_destroy();
    }
}

?>



<body>
<section id="header">
        <a href="#"><img class="logo" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="drinks.php">Drinks</a></li>
                <li><a href="statistics.php">Statistics</a></li>
                <li><a href="about-us.php">About-us</a></li>
                <?php
                    if(!$user_data){
                        echo'<li><a href="register.php" class="signIn">Sign in</a></li>';
                    }
                    else{
                        $image = $user_data["image"];
                        $user_username = $user_data['username'];
                        $variabila = "<div class=\"active-avatar\">
                        <div class=\"avatar\">
                            <img id=\"avatar-img\" onclick=\"menu2()\" src=\"avatars/$image\" title=\"
                            $image\">
                        </div>
                        <div class=\"avatar-menu\" id=\"avatar-menu-id\">
                            <h3>$user_username</h3>
                            <ul>
                                <li><a class =\"youraccount\" href=\"account-page.php\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>Your account</a></li>
                                <li>
                                    <form id=\"logoutform\" method=\"post\">
                                        <input type = \"submit\" name = \"logoutbutton\" value=\"Log Out\">
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>";

                        echo $variabila;    
                    }
                ?>
            </ul>
        </div>
        <div id="mobile">
            <script src="assets/scripts/menu.js"></script>
            <i id="bar" class="fa fa-list-ul fa-lg" aria-hidden="true" onclick="menu()"></i>
        </div>
    </section>



    

    <section id="hero">
        <img class="soda" src="assets/img/sodro-soda.png" alt="Soda">
        <h1>ORGANISE YOUR DRINKS</h1>
        <h1 style="color:var(--light-purple)">THE SMART WAY</h1>
    </section>

    <footer style="margin-top: 500px;">
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