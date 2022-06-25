<?php

session_start();

include("connection.php");
include("functions.php");
$database = new connectionDB("localhost", "root", "", "sodrodatabase");
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

<body id="account-page-body">

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



    <section id="account-page">
        <div class="account-preferences-container">
            <h1>Drinks preferences</h1>
            <h2>Your drinks preferences are kept in our database.</h2>
            <div class="account-preferences-all">
                <div class="row-start">
                    <img class="logo" src="assets/img/account-preferrences/Sugar_Sweeteners.png" alt="SoDrO Logo">
                    <h3> Sugar / Sweeteners</h3>
                    <form id="sugar-yes-form" method="post">
                        <button type="submit" class="btn-preferences" name="sugar-yes-button">YES</p>
                    </form>
                    <form id="sugar-no-form" method="post">
                        <button type="submit" class="btn-preferences" name="sugar-no-button">NO</p>
                    </form>
                </div>
                <div class="row-start">
                    <img class="logo" src="assets/img/account-preferrences/Flavouring.png" alt="SoDrO Logo">
                    <h3> Flavouring</h3>
                    <form id="flavouring-yes-form" method="post">
                        <button type="submit" class="btn-preferences" name="flavouring-yes-button">YES</p>
                    </form>
                    <form id="flavouring-no-form" method="post">
                        <button type="submit" class="btn-preferences" name="flavouring-no-button">NO</p>
                    </form>
                </div>
                <div class="row-start">
                    <img class="logo" src="assets/img/account-preferrences/Carbonated.png" alt="SoDrO Logo">
                    <h3> Carbonated</h3>
                    <form id="carbonated-yes-form" method="post">
                        <button type="submit" class="btn-preferences" name="carbonated-yes-button">YES</p>
                    </form>
                    <form id="carbonated-no-form" method="post">
                        <button type="submit" class="btn-preferences" name="carbonated-yes-button">NO</p>
                    </form>
                </div>
                <div class="row-start">
                    <img class="logo" src="assets/img/account-preferrences/Sugar_Sweeteners.png" alt="SoDrO Logo">
                    <h3> Caffeine</h3>
                    <form id="caffeine-yes-form" method="post">
                        <button type="submit" class="btn-preferences" name="caffeine-yes-button">YES</p>
                    </form>
                    <form id="caffeine-no-form" method="post">
                        <button type="submit" class="btn-preferences" name="caffeine-no-button">NO</p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $stringPreferences;

        if (isset($_GET['sugar-yes-button'])) {
        }
        if (isset($_GET['sugar-no-button'])) {
            $stringPreferences  = $stringPreferences . "1";
            $sql = "update users set preferences = $stringPreferences";

            mysqli_query($database->con, $sql);

            $regexcond = trim($input);
            $regexcond = preg_replace('!\s+!', ' ', $regexcond); //change how many space beetwen word to one space
            $regexcond = trim($regexcond);
            $regexcond = str_replace(" ", ".+", $regexcond); // change all space to .+ for search with regex
            $sqlsugar = "SELECT * FROM products where ingredients like ";
        }

        if (isset($_GET['flavouring-yes-button'])) {
        }
        if (isset($_GET['flavouring-no-button'])) {
            $stringPreferences = $stringPreferences . "2";
            $sql = "update users set preferences = $stringPreferences";
            mysqli_query($database->con, $sql);
        }
        if (isset($_GET['carbonated-yes-button'])) {
        }
        if (isset($_GET['carbonated-no-button'])) {
            $stringPreferences = $stringPreferences . "3";
            $sql = "update users set preferences = $stringPreferences";
            mysqli_query($database->con, $sql);
        }
        if (isset($_GET['caffeine-yes-button'])) {
        }
        if (isset($_GET['caffeine-no-button'])) {
            $stringPreferences = $stringPreferences . "4";
            $sql = "update users set preferences = $stringPreferences";
            mysqli_query($database->con, $sql);
        }
    }







    ?>




    <footer>
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png" alt="SoDrO Logo"></a>
        </div>
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png" alt="SoDrO Logo"></a>
        </div>
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png" alt="SoDrO Logo"></a>
        </div>

    </footer>
</body>