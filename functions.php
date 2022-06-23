<?php 

require_once('product.php');
require_once('connection.php');

function check_login($con){
 if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
       
        $query = "select * from users where user_id = '$id' limit 1";

        $database = new connectionDB("localhost","root","","sodrodatabase");
      
        $result = mysqli_query($database->con,$query);

        if($result && mysqli_num_rows($result) > 0)
        {
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

    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for($i = 0; $i<$len; $i++){

        $text .= rand(0,9);
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
){

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
    $product_image);


    //Get all data from DataBase


    $element = "
    <div class=\"drink\">
        <h3>$product->product_name</h3>
            <div class=\"drink-img\">
                <img src=\"$product->product_image\">
            </div>
            <input type='hidden' name='product_id' value='$product->product_id'>
    </div>";

    echo $element;

}


//get products from database
function getData($con){
    $sql = "SELECT * FROM PRODUCTS";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }

}

   