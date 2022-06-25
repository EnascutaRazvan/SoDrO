<?php

session_start();

include("connection.php");
include("functions.php");
$database = new connectionDB("localhost", "root", "", "sodrodatabase");
$user_data = check_login($database->con);

if (!$user_data)
    header("Location: register.php");





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

<body id="drinks-body">

    <script>
        function searchProducts(input) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('drinks-section').innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "drinks-utilities.php?search=" + input, true);
            xmlhttp.send();
        }
    </script>




    <section id="header">
        <a href="#"><img class="logo" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="drinks.php">Drinks</a></li>
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

    <section id="drinks-page">
        <div id="drinks-search">
            <h1>Soft Drinks Search</h1>
            <h2>Search for words present in the drinks name, categories and ingredients</h2>
            <form>
                <input type="text" placeholder="Search.." name="search" onkeyup="searchProducts(this.value)">
            </form>
        </div>

        <div id="drinks-section-filter-products">
            <div id="filters">
                <form action="" method="GET">
                    <input type="submit">
                    <div class="filter">
                        <h2>Price</h2>
                        <?php

                        $sql = "SELECT * FROM filterlist where classname = 'price' ";

                        $price_query_run = mysqli_query($database->con, $sql);

                        if (mysqli_num_rows($price_query_run) > 0) {
                            foreach ($price_query_run as $pricelist) {
                                $checked = [];
                                if (isset($_GET['prices'])) {

                                    $checked = $_GET['prices'];
                                }


                        ?>

                                <div class="row-start">
                                    <input type="checkbox" name="prices[]" value="<?= $pricelist['id'] ?> " <?php
                                                                                                            if (in_array($pricelist['id'], $checked)) {
                                                                                                                echo "checked";
                                                                                                            }

                                                                                                            ?> />
                                    <label for="vehicle1"> <?= $pricelist['name'] ?></label>
                                </div>
                        <?php
                            }
                        }

                        ?>
                    </div>

                    <div class="filter">
                        <h2>Category</h2>
                        <?php

                        $sql = "SELECT * FROM filterlist where classname = 'category' ";

                        $category_query_run = mysqli_query($database->con, $sql);

                        if (mysqli_num_rows($category_query_run) > 0) {

                            if (isset($_GET['categories'])) {

                                $checked = $_GET['categories'];
                            }

                            foreach ($category_query_run as $categorylist) {
                        ?>

                                <div class="row-start">
                                    <input type="checkbox" name="categories[]" value="<?= $categorylist['id'] ?>" <?php
                                                                                                                    if (in_array($categorylist['id'], $checked)) {
                                                                                                                        echo "checked";
                                                                                                                    }

                                                                                                                    ?> />
                                    <label for="vehicle1"> <?= $categorylist['name'] ?></label>
                                </div>
                        <?php
                            }
                        }

                        ?>

                    </div>

                    <div class="filter">
                        <h2>Continent</h2>
                        <?php

                        $sql = "SELECT * FROM filterlist where classname = 'Continent' ";

                        $Continent_query_run = mysqli_query($database->con, $sql);

                        if (mysqli_num_rows($Continent_query_run) > 0) {

                            if (isset($_GET['Continents'])) {

                                $checked = $_GET['Continents'];
                            }
                            foreach ($Continent_query_run as $Continentlist) {
                        ?>

                                <div class="row-start">
                                    <input type="checkbox" name="Continents[]" value="<?= $Continentlist['id'] ?>" <?php
                                                                                                                    if (in_array($Continentlist['id'], $checked)) {
                                                                                                                        echo "checked";
                                                                                                                    }

                                                                                                                    ?> />
                                    <label for="vehicle1"> <?= $Continentlist['name'] ?></label>
                                </div>
                        <?php
                            }
                        }

                        ?>

                    </div>

                </form>
            </div>
            <form action="" method="GET">
                <div id="drinks-section">
                    <?php
                    $filter_checked = [];
                    $current_products_id = [];
                    if (isset($_GET['prices'])) {
                        $filter_checked = $_GET['prices'];
                        foreach ($filter_checked as $row_check) {
                            $sqlprod = "SELECT * from products where price >=";
                            $sql = "SELECT * FROM filterlist where classname = 'price' and id = $row_check";

                            $result = mysqli_query($database->con, $sql);
                            $result_list = mysqli_fetch_assoc($result);
                            $concatId = preg_split("/[\s,]+/", $result_list['name']);
                            $sqlprod .= "$concatId[0]";
                            $sqlprod .= " AND price <= $concatId[2]";
                            $products_result = mysqli_query($database->con, $sqlprod);
                            if (mysqli_num_rows($products_result) > 0) {
                                while ($row = mysqli_fetch_assoc($products_result)) {
                                    if (!in_array($current_products_id, explode(',', $row['id']))) {
                                        array_push($current_products_id, $row['id']);
                                    }
                                }
                            }
                        }
                    }
                    if (isset($_GET['categories'])) {
                        $filter_checked = $_GET['categories'];
                        foreach ($filter_checked as $row_check) {
                            $sql = "SELECT * FROM filterlist where classname = 'category' and id = $row_check";
                            $result = mysqli_query($database->con, $sql);
                            $result_filter = mysqli_fetch_assoc($result);
                            $result_filtername = $result_filter['name'];

                            $sqlprod = "SELECT * from products where category = '$result_filtername'";

                            $products_result = mysqli_query($database->con, $sqlprod);
                            if (mysqli_num_rows($products_result) > 0) {
                                while ($row = mysqli_fetch_assoc($products_result)) {
                                    if (!in_array($current_products_id, explode(',', $row['id']))) {
                                        array_push($current_products_id, $row['id']);
                                    }
                                }
                            }
                        }
                    }
                    foreach ($current_products_id as $id) {
                        $sql = "SELECT * FROM products WHERE id = $id";

                        $result_products = mysqli_query($database->con, $sql);

                        $row = mysqli_fetch_assoc($result_products);
                        productEcho($row['id'], $row['name'], $row['price'], $row['quantity'], $row['category'], $row['ingredients'], $row['countries'], $row['stores'], $row['pathing']);
                    }
                    $_SESSION['id'] = $current_products_id;
                    if (!isset($_GET['prices']) && !isset($_GET['categories'])) {
                        $sql = "SELECT * from products";
                        $products_result = getData($database->con);
                        if (mysqli_num_rows($products_result) > 0) {
                            while ($row = mysqli_fetch_assoc($products_result)) {
                                productEcho($row['id'], $row['name'], $row['price'], $row['quantity'], $row['category'], $row['ingredients'], $row['countries'], $row['stores'], $row['pathing']);
                            }
                        }
                    }








                    //$result = getData($database->con);
                    //$currentIds = array();
                    //while ($row = mysqli_fetch_assoc($result)) {
                    //    productEcho($row['id'], $row['name'], $row['price'], $row['quantity'], $row['category'], $row['ingredients'], $row['countries'], $row['stores'], $row['pathing']);
                    //    array_push($currentIds, strval($row['id']));
                    //}
                    //$_SESSION['id'] = $currentIds;

                    ?>
                </div>
            </form>
        </div>
    </section>

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