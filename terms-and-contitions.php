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
</head>

<body>

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

    <section id="terms-and-conditions">
        <div id="terms-title">
            <h1>TERMS &</h1>
            <h1>CONDITIONS</h1>
        </div>

        <h2>1.DEFINITIONS AND TERMS</h2>

        <h3>SoDrO <span class="h3-text">- is the trade name of S.C. DANTE INTERNATIONAL S.A., legal person of Romanian
                nationality, having its registered office in Iasi, Faculty of Computer Science, 2A4, having serial
                number in the Trade Register J40 / 372 / 03.09.2001, unique fiscal registration code RO14399840.</span>
        </h3>
        <h3>Seller <span class="h3-text">- SoDrO or any partner in the SoDrO Marketplace.</span>
        </h3>
        <h3>Client <span class="h3-text">- can be any natural person over the age of 16 or legal person who has or
                obtains access to CONTENT, through any means of communication provided by SoDrO (electronic, telephone,
                etc.) or based on an existing user agreement between SoDrO and this and which requires the creation and
                use of an Account.
            </span>
        </h3>
        <h3>User <span class="h3-text">- any natural person over the age of 16 or a legal person registered on the Site,
                who, by completing the account creation process, has agreed to the site-specific clauses in the General
                Terms and Conditions section.</span>
        </h3>
        <h3>Account <span class="h3-text">- the section of the Site consisting of an e-mail address and a password that
                allows the Buyer to send the Order and which contains information about the Customer / Buyer and the
                history of the Buyer on the Site (Orders, tax invoices, goods guarantees, etc.). The user is responsible
                and will ensure that all information entered when creating the Account is correct, complete and up to
                date</span>
        </h3>
        <h3>Favorites <span class="h3-text">- section of the Account that allows the Buyer / User to create Lists of
                Goods and Services that he wants to follow for a possible acquisition using the service offered by the
                Seller to track the Goods and Services by receiving Commercial Communications from his part.</span>
        </h3>
        <h3>List <span class="h3-text">- Favorites section in which the Buyer / User can add Goods or Services that he
                wants to follow in order to make a possible purchase and which he can later delete or add to the
                shopping cart ("My Cart").</span>
        </h3>

        <h2>1.CONTRACTUAL DOCUMENTS</h2>

        <h3>2.1 <span class="h3-text">- For justified reasons, Seller reserves the right to change the quantity of Goods
                and / or Services in the Order. If you change the quantity of Goods and / or Services in the Order, you
                will notify the Buyer of the e-mail address or telephone number provided to the Seller when placing the
                Order and will return the amount paid.</span>
        </h3>
        <h3>2.2 <span class="h3-text">- By registering an Order on the Site, the Buyer agrees to the form of
                communication (telephone or e-mail) through which the Seller carries out its commercial operations.

            </span>
        </h3>
        <h3>2.3 <span class="h3-text">-The contract is considered concluded between the Seller and the Buyer upon
                receipt by the Buyer from the Seller, by e-mail and / or SMS of the notification of dispatch of the
                Order.
            </span>
        </h3>
        <h3>2.4 <span class="h3-text">- For the Orders to be delivered to the SoDrO showrooms and delivery points, the
                prices and reservations of the Goods and / or Services are valid for 72 (seventy-two) hours from the
                registration of the Order by the Buyer.
            </span>
        </h3>
        <h3>2.5 <span class="h3-text">The document and the information provided by the Seller on the Site will be the
                basis of the Contract, in addition to which it will be the guarantee certificate issued by the Seller or
                a supplier thereof for the purchased Goods.</span>
        </h3>
        <h3>2.6 <span class="h3-text">- The notification received by the Buyer, after the execution of the Order, has
                the
                role of information and does not represent the acceptance of the Order. This notification is made
                electronically (e-mail) or by telephone.</span>
        </h3>


    </section>

    <footer class="section-p1">
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