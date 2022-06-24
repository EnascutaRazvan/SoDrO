<?php
session_start();

require_once("functions.php");



$search = $_REQUEST['search'];




//Fac search 
// aplic filtre



$element = "";
getProductsBySearch($search, $_SESSION['id']);
