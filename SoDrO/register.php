<?php

session_start();


    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted

        $username = $_POST['username'];
        $password = hash("sha256",$_POST['password']);
        $email = $_POST['email'];
            // save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, username,email,password) values ('$user_id', '$username','$email','$password')";
            $database = new connectionDB("localhost","root","","sodrodatabase");
            $result = mysqli_query($database->con,$query);
    

            header("Location: login.php");
            die;
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
        <a href="index.php"><i class="fa fa-angle-left" style="font-size:36px"></i></a>
        <a href="index.php"><img class="logo-sign" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <br>
    </section>

    <script src="script.js"></script>

    <form id="registerform" onsubmit="return RegisterValidation()" method="post">
        <div id="signin-form">

            <div id="signin-buttons">
                <a href="#" class="signin-button register">Register</a>
                <a href="login.php" class="signin-button login">Login</a>
            </div>


            <label for="username"></label>
            <input type="text" placeholder="Username" name="username" required>

            <label for="psw"></label>
            <input type="password" placeholder="Password" name="password" required>

            <label for="psw-repeat"></label>
            <input type="password" placeholder="Password (again)" name="passwordrepeat" required>

            <label for="email"></label>
            <input type="text" placeholder="E-mail" name="email" required>

            <label for="email-repeat"></label>
            <input type="text" placeholder="E-mail (again)" name="emailrepeat" required>

            <p>SoDrO does not sell your <br>personal information <a href="terms-and-contitions.php">Terms & Conditions</a>
            </p>
            <button type="submit" class="signin-button" id="create-account-button">CREATE ACCOUNT</p>

        </div>
        </div>
    </form>

</body>