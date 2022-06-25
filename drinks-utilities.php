<?php
session_start();
require_once("functions.php");
$search = $_REQUEST['search'];

getProductsBySearch($search, $_SESSION['id']);
