<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">

    
    <title><?= isset($PageTitle) ? $PageTitle : "Inv Manager" ?></title>
    <?php if (function_exists('customPageHeader')) {
        customPageHeader();
    } ?>
</head>
<body>
    <header>
        <a href="index.html" class="logo">
            Inv Manager
        </a>

        <nav>
            <a href="#" class="nav-link">Profile</a>
            <a href="#" class="nav-link">Admin Tools</a>
            <a href="#" class="nav-link">Cart</a>
            <a href="#" class="nav-link">Login</a>
            <a href="#" class="nav-link">Signup</a>
        </nav>
    </header>