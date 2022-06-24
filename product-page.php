<?php
require_once("connection.php");
require_once("functions.php");


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
</head>

<body id="products-body">

    <section id="header">
        <a href="#"><img class="logo" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="drinks.php">Drinks</a></li>
                <li><a href="statistics.php">Statistics</a></li>
                <li><a class="active" href="about-us.php">About-us</a></li>
                <a href="register.php" class="signIn">Sign in</a>
            </ul>
        </div>
        <div id="mobile">
            <script src="assets/scripts/menu.js"></script>
            <i id="bar" class="fa fa-list-ul fa-lg" aria-hidden="true" onclick="menu()"></i>
        </div>
    </section>

    <section id="product-page">
        <div class="product-page-container">
            <?php
            require_once("connection.php");
            require_once("functions.php");


            $database = new connectionDB("localhost", "root", "", "sodrodatabase");
            $product_id = $_GET["product_id"];

            $product = getProductById($database->con, $product_id);

            productDetailsEcho($product);




            ?>

        </div>



    </section>


</body>