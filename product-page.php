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
</head>

<body id="products-body">

    <section id="header">
        <a href="#"><img class="logo" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="drinks.php">Drinks</a></li>
                <li><a href="statistics.php">Statistics</a></li>
                <li><a href="about-us.php">About-us</a></li>
                <?php
                if (!$user_data) {
                    echo '<li><a href="register.php" class="signIn">Sign in</a></li>';
                } else {
                    $image = $user_data["image"];
                    $user_username = $user_data['username'];
                    $variabila = "<div class=\"active-avatar\">
                        <div class=\"avatar\">
                            <img src=\"avatars/$image\" title=\"
                            $image\">
                        </div>
                        <div class=\"avatar-menu\">
                            <h3>$user_username</h3>
                            <ul>
                            <li><a href=\"account-page.php\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>Your account</a></li>
                                <li><a href=\"\"><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i>Log Out</a></li>
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

    <section id="product-page">
        <div class="product-page-container">
            <?php
            require_once("connection.php");
            require_once("functions.php");


            $database = new connectionDB("localhost", "root", "", "sodrodatabase");
            $product_id = $_GET["product_id"];

            $product = getProductById($database->con, $product_id);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['likeproduct'])) {
                    $user = "SELECT likesId from products where id = $product->product_id";
                    $resultuser = mysqli_query($database->con, $user);
                    $checkuser = mysqli_fetch_assoc($resultuser);

                    if (!str_contains($checkuser['likesId'], $_SESSION['user_id'])) {
                        echo $checkuser['likesId'];
                        //echo $_SESSION['user_id'];
                        $product->incrementLikes();
                        $sql = "UPDATE products SET likes = $product->product_likes where id = $product->product_id";
                        $currentSessionId = $_SESSION['user_id'];
                        $currentSessionId = $_SESSION['user_id'] . "," . $checkuser['likesId'];
                        $sqluser = "UPDATE products SET likesId = '$currentSessionId' where id = $product->product_id";
                        $result = mysqli_query($database->con, $sql);
                        $result2 = mysqli_query($database->con, $sqluser);
                    } else {
                        echo '<script>alert("You already liked this product")</script>';
                    }
                }

                if (isset($_POST['addfav'])) {
                    $currentSessionId = $_SESSION['user_id'];
                    $selectWishlist = "Select wishlist from users where user_id = $currentSessionId";
                    $resultwishlist = mysqli_fetch_assoc(mysqli_query($database->con, $selectWishlist));
                    $currentwishlist;
                    if (!str_contains($resultwishlist['wishlist'], $product->product_id)) {

                        if ($resultwishlist['wishlist'] == "") {
                            $currentwishlist = $product->product_id . ",";
                        } else {
                            $currentwishlist = $resultwishlist['wishlist'] . $product->product_id . ",";
                        }

                        print_r($currentwishlist);

                        $sql = "UPDATE users set wishlist = '$currentwishlist' where user_id = $currentSessionId";
                        $result = mysqli_query($database->con, $sql);
                    }
                }
            }

            productDetailsEcho($product);
            ?>



        </div>



    </section>


</body>