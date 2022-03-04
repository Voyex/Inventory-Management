<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= isset($PageDesc) ? $PageDesc : "Description" ?>">

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/global.css">
    
    <title><?= isset($PageTitle) ? $PageTitle : "Inv Manager" ?></title>
    <?php if (function_exists('customPageHeader')) {
        customPageHeader();
    } ?>
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="logo">
                Inv Manager
            </a>

            <ul>
                <li><a href="#" class="nav-link">Profile</a></li>
                <li><a href="#" class="nav-link">Admin</a></li>
                <li><a href="#" class="nav-link">Cart</a></li>
                <li><a href="login.php" class="nav-link">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>