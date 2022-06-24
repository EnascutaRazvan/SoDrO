<?php

require_once('product.php');
require_once('connection.php');

function check_login($con)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];

        $query = "select * from users where user_id = '$id' limit 1";

        $database = new connectionDB("localhost", "root", "", "sodrodatabase");

        $result = mysqli_query($database->con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            return $user_data;
        }

        echo  $_SESSION['user_id'];
    }

    // redirect to login
}


function  random_num($length)
{

    $text = "";

    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {

        $text .= rand(0, 9);
    }

    return $text;
}

function productEcho(
    $product_id,
    $product_name,
    $product_price,
    $product_cantity,
    $product_category,
    $product_ingredients,
    $product_countries,
    $product_stores,
    $product_image
) {

    //Creating a new product

    $product = new product(
        $product_id,
        $product_name,
        $product_price,
        $product_cantity,
        $product_category,
        $product_ingredients,
        $product_countries,
        $product_stores,
        $product_image
    );


    //Get all data from DataBase


    $element = "
    <a href =\"product-page.php?product_id=$product->product_id\">
    <div class=\"drink\" onclick = 'showProduct($product->product_id)'>
        <h3>$product->product_name</h3>
            <div class=\"drink-img\">
                <img src=\"$product->product_image\">
            </div>
            <input type='hidden' name='product_id' value='$product->product_id'>
    </div>
    </a>";

    echo $element;
}




//get products from database
function getData($con)
{
    $sql = "SELECT * FROM PRODUCTS";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}


function getProductById($con, $product_id)
{

    $sql = "SELECT * FROM PRODUCTS WHERE ID = $product_id";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($result);


    if (mysqli_num_rows($result) > 0) {
        return new Product($row['id'], $row['name'], $row['price'], $row['quantity'], $row['category'], $row['ingredients'], $row['countries'], $row['stores'], $row['pathing']);
    }
}

function productDetailsEcho($product)
{

    $element = "
    <div class=\"product-header\">
    <h1>$product->product_name</h1>
</div>
<div class=\"product-img-container\">
    <div class=\"product-img\">
        <img src=\"$product->product_image\">
    </div>
</div>

<div class=\"product-elements\">
    <div id=\"product-characteristics\" class=\"product-element\">
        <h2>Product Characteristics</h2>
        <div class=\"row-start\">
            <h3>Category: </h3>
            <h4>$product->product_category</h4>
        </div>
        <div class=\"row-start\">
            <h3>Quantity: </h3>
            <h4>$product->product_cantity</h4>
        </div>
        <div class=\"row-start\">
            <h3>Price: </h3>
            <h4>$product->product_price</h4>
        </div>
        <div class=\"row-start\">
            <h3>Ingredients: </h3>
            <h4>$product->product_ingredients</h4>
        </div>
    </div>

    <div id=\"product-region\" class=\"product-element\">
        <h2>Region</h2>
        <div class=\"row-start\">
            <h3>Countries: </h3>
            <h4>$product->product_countries</h4>
        </div>
        <div class=\"row-start\">
            <h3>Available: </h3>
            <h4>$product->product_stores</h4>
        </div>

    </div>

    <div id=\"product-add-list\" class=\"product-element\">
        <h2>Add to list</h2>
        <div class=\"row-start\">
            <h3>Countries: </h3>
            <h4>asd</h4>
        </div>
    </div>
</div>
";

    echo $element;
}


function getProductsBySearch($input, $ids)
{
    $regexcond = trim($input);
    $regexcond = preg_replace('!\s+!', ' ', $regexcond); //change how many space beetwen word to one space
    $regexcond = trim($regexcond);
    $regexcond = str_replace(" ", ".+", $regexcond); // change all space to .+ for search with regex
    $database = new connectionDB("localhost", "root", "", "sodrodatabase");

    foreach ($ids as $id) {
        $sql = "SELECT * from products where CONCAT(name, price, quantity, category, ingredients, countries, stores, pathing) REGEXP '$regexcond' and id = $id";

        $result = mysqli_query($database->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $result_array = mysqli_fetch_assoc($result);
            sendProductsToAjax($result_array);
        }
    }


    return $result;
}

function getProductsByFilter($filter, $id, $id_session)
{
    $database = new connectionDB("localhost", "root", "", "sodrodatabase");
    if ($id === "price") {
        $new_id_session = array();
        foreach ($id_session as $key) {
            $sql = "SELECT * FROM products where id = $key AND price > ";
            $concatId = preg_split("/[\s,]+/", $filter);
            $sql .= "$concatId[0]";
            $sql .= " AND price < $concatId[2]";
            $result = mysqli_query($database->con, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                array_push($new_id_session, $row['id']);
            }
        }
    }

    return $new_id_session;
}


function getAllIdProducts()
{
    $sql = "SELECT * FROM PRODUCTS";
    $database = new connectionDB("localhost", "root", "", "sodrodatabase");

    $result = mysqli_query($database->con, $sql);

    $_SESSION['id'] = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($_SESSION['id'], strval($row['id']));
    }

    return $_SESSION['id'];
}

function getProductsByIdSession($id_session)
{
    $database = new connectionDB("localhost", "root", "", "sodrodatabase");

    foreach ($id_session as $key) {
        $sql = "SELECT * FROM products where id = $key";

        $row = mysqli_fetch_assoc(mysqli_query($database->con, $sql));
        sendProductsToAjax($row);
    }
}


function sendProductsToAjax($row)
{

    $id = $row['id'];
    $name = $row['name'];
    $image = $row['pathing'];

    $element = "
    <a href =\"product-page.php?product_id=$id\">
    <div class=\"drink\" onclick = 'showProduct($id)'>
        <h3>$name</h3>
            <div class=\"drink-img\">
                <img src=\"$image\">
            </div>
            <input type='hidden' name='product_id' value='$id'>
    </div>
    </a>";

    echo $element === "" ? "No products" : $element;
}
