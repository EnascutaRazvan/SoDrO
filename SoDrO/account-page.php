<?php

session_start();

include("connection.php");
include("functions.php");
$database = new connectionDB("localhost","root","","sodrodatabase");
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
    <script src="script.js"></script>
</head>

<body id="account-page-body">

<section id="header">
        <a href="#"><img class="logo" src="assets/svg/logo.svg" alt="SoDrO Logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="drinks.php">Drinks</a></li>
                <li><a href="statistics.php">Statistics</a></li>
                <li><a href="about-us.php">About-us</a></li>
                <?php
                    if(!$user_data){
                        echo'<li><a href="register.php" class="signIn">Sign in</a></li>';
                    }
                    else{
                        $image = $user_data["image"];
                        $user_username = $user_data['username'];
                        $variabila = "<div class=\"active-avatar\">
                        <div class=\"avatar\">
                            <img id=\"avatar-img\" onclick=\"menu2()\" src=\"avatars/$image\" title=\"
                            $image\">
                        </div>
                        <div class=\"avatar-menu\" id=\"avatar-menu-id\">
                            <h3>$user_username</h3>
                            <ul>
                            <li><a class =\"youraccount\" href=\"account-page.php\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i>Your account</a></li>
                                <li>
                                    <form id=\"logoutform\" method=\"post\">
                                        <input type = \"submit\" name = \"logoutbutton\" value=\"Log Out\"></input>
                                    </form>
                                </li>
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


    <section id="account-page">
        <div class="account-page-container">
    <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <div class="upload">
        <?php
        $id = $user_data["id"];
        $name = $user_data["username"];
        $image = $user_data["image"];
        ?>
        <img src="avatars/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
        <div class="round">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="username" value="<?php echo $name; ?>">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
    </form>



    <script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>




    <?php

    if(isset($_FILES["image"]["name"])){



      $id = $_POST["id"];
      $name = $_POST["username"];



      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];




      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));



      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = 'account-page.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = 'account-page.php';
        </script>
        ";
      }




      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;

        $query = "UPDATE users   SET image = '$newImageName' WHERE id = $id";

        mysqli_query($database->con, $query);
        move_uploaded_file($tmpName, 'avatars/' . $newImageName);

        
        echo
        "
        <script>
        document.location.href = 'account-page.php';
        </script>
        ";
      }
    }?>



            <h1>Welcome,</h1>
            <h1>
                <?php

                echo $user_data['username'];
                ?>
                </h1>

            <div id="account-all-options">
                <div class="account-option">
                    <a href="wishlist.php">
                        <img src='assets/img/account-page/Personal lists of drinks.png'>
                        <h2>Personal list of drinks</h2>
                    </a>
                </div>
                <div class="account-option">
                    <a href="change-password.php">
                        <img src='assets/img/account-page/Change passwrod.png'>
                        <h2>Change Password</h2>
                    </a>
                </div>
                <div class="account-option">
                    <a href="account-preferences.php">
                        <img src='assets/img/account-page/Food Preferences and allergens.png'>
                        <h2>Drinks Preferences</h2>
                    </a>
                </div>
                <div class="account-option">
                    <a href="terms-and-contitions.php">
                        <img src='assets/img/account-page/Terms and conditions.png'>
                        <h2>Terms and conditions</h2>
                    </a>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png"
                    alt="SoDrO Logo"></a>
        </div>
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png"
                    alt="SoDrO Logo"></a>
        </div>
        <div class="qr-code col">
            <h3>SoDrO Github Page</h3>
            <h4>Frențescu Cezar</h4>
            <h4>Enascuță Răzvan</h4>
            <a href="https://github.com/FrentescuCezar/TehnologiiWeb/"><img class="logo" src="assets/img/QR-code.png"
                    alt="SoDrO Logo"></a>
        </div>

    </footer>
</body>