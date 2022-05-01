<?php
require_once "dbh.inc.php";

echo 'Here';

function isCorrectPassword($conn, $pwd, $userID) {
    $sql = "SELECT * FROM user WHERE id = $userID";

    $result = mysqli_query($conn, $sql);

    $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

    if ($result["password"] == $hashpwd) return true;
    else return false;
}

function changePassword($conn, $pwd, $userID) {


    $sql = "UPDATE user SET password = ? WHERE id = ?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailure");
        exit();   
    }

    $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param ($stmt, "ss", $hashpwd, $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return true;
}

if (isset($_POST["submit"])) {
    session_start();
    $currentPwd = $_POST["currPass"];
    $pwd = $_POST["pass"];
    $pwdRepeat = $_POST["rePass"];
    $userID = $_SESSION["userID"];

    if (pwdDoesntMatch($pwd, $pwdRepeat)) {
        header("Location: ../profile.php?error=nopwdmatch");
        exit();
    }
    if (!isCorrectPassword($conn, $pwd, $userID)) {
        header("Location: ../profile.php?error=incorrectpwd");
        exit();
    }

    // Attempts to change the password
    if (changePassword($conn, $pwd, $userID)) {
        header("Location: ../profile.php?error=none");
        exit();
    } else {
        header("Location: ../profile.php?error=pwdcantchange");
    }

}