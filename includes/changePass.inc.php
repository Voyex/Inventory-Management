<?php
require_once "dbh.inc.php";

function isCorrectPassword($conn, $pwd, $userID) {
    echo $userID;
    $sql = "SELECT password FROM user WHERE id = $userID;";
    echo $sql;
    echo "Here 2.0";
    if ($result = mysqli_query($conn, $sql)) {
        if ($row = mysqli_fetch_assoc($result)) {
            echo $row['password'];
        }
    }
    return password_verify($pwd, $row['password']);
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

    echo "Here";

    if (pwdDoesntMatch($pwd, $pwdRepeat)) {
        header("Location: ../profile.php?error=nopwdmatch");
        exit();
    }
    echo "Here2";
    if (!isCorrectPassword($conn, $currentPwd, $userID)) {
        header("Location: ../profile.php?error=incorrectpwd");
        exit();
    }
    echo "Here3";
    // Attempts to change the password
    if (changePassword($conn, $pwd, $userID)) {
        header("Location: ../profile.php?error=none");
        exit();
    } else {
        header("Location: ../profile.php?error=pwdcantchange");
    }

} else header("Location: ../profile.php?error=redirecterror");
