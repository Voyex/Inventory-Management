<?php
session_start();
// Initialize Twig
require_once "vendor/autoload.php";

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= isset($PageDesc) ? $PageDesc : "Description" ?>">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/global.css">

    <title><?= isset($PageTitle) ? $PageTitle : "Inv Manager" ?></title>
    <?php if (function_exists('customPageHeader')) {
        customPageHeader();
    } ?>
</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="logo" id="index-link">
                Inv Manager
            </a>
            <ul>
                <?php
                if (isset($_SESSION["userID"])) {
                    echo "<li class='dropdown'><a href='profile.php' class='nav-link dropdown' id='profile-link'>Profile</a>";
                    if ($_SESSION["userType"] == "customer") {
                        echo "<div class='dropdown-content'>";
                        echo "<a href='view-orders.php'>Orders</a>'";
                        echo "</div></li>";
                    }
                    if ($_SESSION["userType"] == "admin") {
                        echo "<li><a href='admin.php' class='nav-link' id='admin-link'>Admin</a></li>";
                    }
                    echo "<li><a href='cart.php' class='nav-link' id='cart-link'>Cart</a></li>";
                    echo "<li><a href='includes/signout.inc.php'>Signout</a></li>";
                } else {
                    echo "<li><a href='login.php' class='nav-link' id='login-link'>Login</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>