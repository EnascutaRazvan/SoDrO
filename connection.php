<?php


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sodrodatabase";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    die("failed to connect to the database");
}