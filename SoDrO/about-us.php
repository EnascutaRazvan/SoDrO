<?php

session_start();

include("connection.php");
include("functions.php");
$database = new connectionDB("localhost","root","","sodrodatabase");
$user_data = check_login($database->con);
?>





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
                                        <input type = \"submit\" name = \"logoutbutton\" value=\"Log Out\"></input>
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

    <section id="about-us">
    <h1>ABOUT US</h1>
        <h3>The only way to a brighter future is... the SMART
            way!<br><br>

            We will start with a disclaimer, as we admit technology can often be overwhelming and with the wide array of
            smart drinks gadgets that are now on the market, it’s no wonder if you’re unsure which you should invest
            in.<br><br>

            This is where we come into the picture! We have created a place where our customers can view and buy the
            best smart drinks devices, with the whole experience being tailored to suit each of their individual needs! On
            our platform, you can simulate your own drinks and play around with smart gadgets, building the perfect drinks
            improvement project! You can share your work with others on our Forum and please feel free to view, like and
            comment on others’ posts — in doing so, you can get your creative juices flowing!
        </h3>

        <img class="about-img" src="assets/img/about-line.png" alt="About Line">

        <h3>Why choose the <span style="color: var(--light-purple)">SMART</span> way?<br><br>
            Our company was founded as a response to the sheer lack of competent and reliable providers, affordable
            smart drinks products and the overwhelming demand.<br><br>

            The best smart drinks devices can make your life easier by automating your drinks and enabling you to create
            the perfect atmosphere at your place with only one tap on your smartphone. They can also reduce your energy
            consumption, because forgeting to turn off the lights or the heating mechanism will be worries of the past!
            All you need is your smartphone and you will be able to control the smart systems in your drinks, even when
            you’re not around.<br><br>

            If we have made you even a bit curious, feel free to choose SMART today!<br><br><br>
        </h3>

        <h1>OUR LOCATION</h1>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.
                    1857826735954!2d27.57061408996049!3d47.173799022453395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                    1!3m3!1m2!1s0x40cafb6227e846bd%3A0x193e4b6864504e2c!2s
                    Faculty%20of%20Computer%20Science!5e0!3m2!1sen!2sro!4v1655480712882!5m2!1sen!2sro" width="800"
                height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="map-mobile">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.
                    1857826735954!2d27.57061408996049!3d47.173799022453395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                    1!3m3!1m2!1s0x40cafb6227e846bd%3A0x193e4b6864504e2c!2s
                    Faculty%20of%20Computer%20Science!5e0!3m2!1sen!2sro!4v1655480712882!5m2!1sen!2sro" width="300"
                height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

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