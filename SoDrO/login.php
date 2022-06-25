<?php

session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // something was posted

    $username = $_POST['username'];
    $password = hash("sha256",$_POST['password']);
     
        // read to database
        $query = "select * from users where username = '$username' or email = '$username' limit 1 ";
        $database = new connectionDB("localhost","root","","sodrodatabase");
        $result = mysqli_query($database->con,$query);

        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
              echo $user_data['password'];
    
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                     header("Location: index.php");
                    die;
                }
            }
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
        <a href="index.php"><i class="fa fa-angle-left" style="font-size:36px"></i></a>
        
        <a href="index.php"><img class="logo-sign" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <br>
    </section>

    <form id="registerform" method="post">
        <div id="signin-form">

            <div id="signin-buttons">
                <a href="register.php" class="signin-button register2">Register</a>
                <a href="#" class="signin-button login2">Login</a>
            </div>

            <label for="username"></label>
            <input type="text" placeholder="Username/E-mail" name="username" required>

            <label for="psw"></label>
            <input type="password" placeholder="Password" name="password" required>

            <p>SoDrO does not sell your <br>personal information <a href="#">Terms & Conditions</a>
            </p>
            <button type="submit" class="signin-button" id="login-button">LOGIN</p>
        </div>
        </div>
    </form>


</body>