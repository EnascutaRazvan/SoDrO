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
    <script src="assets/scripts/anychart-core.min.js"></script>
    <script src="assets/scripts/statistics-pie.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/icons/css/font-awesome.min.css">
    <script src="script.js"></script>
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





    <section id="statistics">
        <h1>STATISTICS</h1>
        <div id="statistics-pie"></div>
        <div id="statistics-pie-mobile"></div>
        <hr>
        <h3>Download the <span style="font-family:default">data</span></h3>
        <h3><span style="display: inline-block;
            margin-left: 130px;"></span>In one downloadable <span style="font-family:default">format</span></h3>

        <div id="SVGorCSV">
            
            <a onclick="tableToCSV()" class="statistics-button">CSV</a>
        </div>

    </section>


    <script>


    </script>

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


    <table style="display:none" >
			<tr>
                <th>Categories</th>
                <th></th>
            </tr>
            <tr>
                <td>Soda</td>
                <td>
                    <?php
                        $count = 0;
                        $sql = "SELECT * FROM products WHERE category = 'Soda' ";
                        $result = mysqli_query($database->con,$sql);
                        while($row = mysqli_fetch_assoc($result)){
                            $count = $count + 1 ;
                        }
                        echo $count;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Dairy</td>
                <td>
                    <?php
                            $count = 0;
                            $sql = "SELECT * FROM products WHERE category = 'Dairy' ";
                            $result = mysqli_query($database->con,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $count = $count + 1 ;
                            }
                            echo $count;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Energy Drink</td>
                    <td>
                    <?php
                            $count = 0;
                            $sql = "SELECT * FROM products WHERE category = 'Energy Drink' ";
                            $result = mysqli_query($database->con,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $count = $count + 1 ;
                            }
                            echo $count;
                    ?>
                    </td>
            </tr>
            <tr>
                <td>Syrup</td>
                <td>
                    <?php
                            $count = 0;
                            $sql = "SELECT * FROM products WHERE category = 'Syrup' ";
                            $result = mysqli_query($database->con,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $count = $count + 1 ;
                            }
                            echo $count;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Water</td>
                <td>
                    <?php
                            $count = 0;
                            $sql = "SELECT * FROM products WHERE category = 'Water' ";
                            $result = mysqli_query($database->con,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $count = $count + 1 ;
                            }
                            echo $count;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Tea</td>
                <td>
                    <?php
                            $count = 0;
                            $sql = "SELECT * FROM products WHERE category = 'Tea' ";
                            $result = mysqli_query($database->con,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $count = $count + 1 ;
                            }
                            echo $count;
                    ?>
                </td>
            </tr>
			<tr>
                <th>Prices</th>
                <th></th>
            </tr>
            <tr>
                <td>0.5 - 0.99</td>
                <td>Number of drinks with that price is 14</td>
            </tr>
            <tr>
                <td>1 - 4.99</td>
                <td>Number of drinks with that price is 23</td>
            </tr>
            <tr>
                <td>5 - 9.99</td>
                <td>Number of drinks with that price is 16</td>
            </tr>
            <tr>
                <td>10 - 19.99</td>
                <td>Number of drinks with that price is 6</td>
            </tr>
            <tr>
                <td>20 - 49.99</td>
                <td>Number of drinks with that price is 5</td>
            </tr>
            <tr>
                <td>50 - 99.99</td>
                <td>Number of drinks with that price is 1</td>
            </tr>
            <tr>
                <td>100+</td>
                <td>Number of drinks with that price is 0</td>
            </tr>
        </table>
 
    <script type="text/javascript">
        function tableToCSV() {
 
            
            var csv_data = [];
 
          
            var rows = document.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
 
           
                var cols = rows[i].querySelectorAll('td,th');
 
 
                var csvrow = [];
                for (var j = 0; j < cols.length; j++) {
 

                    csvrow.push(cols[j].innerHTML);
                }
 
  
                csv_data.push(csvrow.join(","));
            }
 
            csv_data = csv_data.join('\n');
 
            downloadCSVFile(csv_data);
 
        }
 
        function downloadCSVFile(csv_data) {

            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            });

            var temp_link = document.createElement('a');
 

            temp_link.download = "SoDrO.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;

            temp_link.style.display = "none";
            document.body.appendChild(temp_link);

            temp_link.click();
            document.body.removeChild(temp_link);
        }
    </script>


</body>