<?php
if (isset($_POST["submit"])) {
    
    $username = $_POST["user"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptySingupInput($username, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdDoesntMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordmismatch");
        exit();
    }

    if(emailUsed($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit(); 
    }

    if(usernameExists($conn, $username) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $email, $pwd);



} else {
    header("location: ../signup.php?error=redirecterror");
    exit();
}