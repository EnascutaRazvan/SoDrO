<?php

session_start();


    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted

        $username = $_POST['username'];
        $password = hash("sha256",$_POST['password']);
        $password2 = hash("sha256",$_POST['password-repeat']);
        $email = $_POST['email'];
        $email2 = $_POST['email-repeat'];

        if(!is_numeric($username) && $password == $password2 && $email == $email2){
            // save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, username,email,password) values ('$user_id', '$username','$email','$password')";
            $database = new connectionDB("localhost","root","","sodrodatabase");
            $result = mysqli_query($database->con,$query);
    

            header("Location: login.php");
            die;

        
        } 
        else{
            echo "Please enter some valid information";
        }

    }
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

<body>
    <section id="header-signin">
        <a href="account-page.php"><i class="fa fa-angle-left" style="font-size:36px"></i></a>
        <a href="index.php"><img class="logo-sign" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <br>
    </section>

    <form id="register-form" method="post">
        <div id="signin-form">


            <label for="old-password"></label>
            <input type="password" placeholder="Old Password" name="old-password" required>

            <label for="new-password"></label>
            <input type="password" placeholder="Password" name="password" required>

            <label for="new-password-again"></label>
            <input type="password" placeholder="New Password (again)" name="new-password-again" required>


            <p>SoDrO does not sell your <br>personal information <a href="terms-and-contitions.php">Terms &
                    Conditions</a>
            </p>
            <button type="submit" class="signin-button" id="create-account-button">Change Password</p>

        </div>
        </div>
    </form>

</body>