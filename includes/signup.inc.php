<?php
if (isset($_POST["submit"])) {
    
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptySingupInput($email, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
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
    
    createUser($conn, $email, $pwd);



} else {
    header("location: ../login.php?error=redirecterror");
    exit();
}