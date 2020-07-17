<?php
require('common/connection.inc.php');
require('common/functions.inc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SimplyMad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="goto-here">

<nav class="navbar navbar-light navbar-expand-md sticky-top" style="background-color: #000000b6;">
    <div class="container-fluid"><a class="navbar-brand" href="./index.php" style="color: rgba(255,255,255,0.9);">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" style="color: #fff;">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse mobileColour" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" style="color: #fff;padding: 10px;" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#about" style="color: #fff;padding: 10px;" class="nav-link">About</a></li>
                <li class="nav-item"><a href="categories.php" style="color: #fff;padding: 10px;" class="nav-link">
                        Categories
                    </a></li>
                <li class="nav-item"><a href="#contact" style="color: #fff;padding: 10px;" class="nav-link">Contact</a></li>
                <?php
                if ($_SESSION['STATUS'] != 'loggedin'){
                    echo  "<li class='nav-item'><a href='login.php' style='color: #fff;padding: 10px 18px;' class='nav-link'>Login</a></li>";
                }else{
                    echo  "<div class=\"dropdown\">
  
    <li class=\"nav-item\"><a id=\"dropdownMenuButton\" data-toggle=\"dropdown\" style=\"color: #fff;padding: 10px 18px;\" class=\"nav-link\">Profile</a></li>
  <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
    <a class=\"dropdown-item\" href=\"change-password.php\">Change Password</a>
    <a class=\"dropdown-item\" href=\"logout.php\">Logout</a>
  </div>
</div>";
                }
                ?>
                <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link" style="color: #fff;padding: 10px;">Wishlist <span style="color: #fff;" class="icon-shopping_cart"></span></a></li>

            </ul>
        </div>
    </div>
</nav>


<!-- END nav -->