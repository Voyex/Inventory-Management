<?php

if(isset($_POST["submit"])) {
    $username = $_POST["user"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyLoginInput($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
    }
    else {
        header("location: copySettings.php");
        exit();
    }