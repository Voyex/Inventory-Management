<?php
/**
 * Contains all PHP functions used by the server
 */

/**
 * ErrorCheck - looks for empty input in the signup fields
 * @param username - the username from the username input field
 * @param email - users email from the email input field
 * @param pwd - password entered in the password input field
 * @param pwdRepeat - the repeat password entered in the second password input field
 */
function emptySingupInput($username, $email, $pwd, $pwdRepeat) {
    $result = null;

    if (empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
    $result = false;
    }
    return $result;
}

/**
 * ErrorCheck - looks for a username containing invalid chars
 * Accepts: a-z, A-Z, and 0-9
 * @param username - the username from the username input field
 */
function invalidUsername($username) {
    $result = false;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/**
 * ErrorCheck - looks for invalid email
 * Verifies: using FILTER_VALIDATE_EMAIL which has similar formatting checks to RFC 822
 * @param email - users email from the email input field
 */
function invalidEmail($email) {
    $result = false;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

/**
 * ErrorCheck - looks for a mismatch in the entered passwords
 * @param pwd -
 * @param pwdRepeat -
 */
function pwdDoesntMatch($pwd, $pwdRepeat) {
    $result = false;

    if($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function eitherExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailure");
        exit();   
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $stmtResult = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($stmtResult)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function usernameExists($conn, $username) {
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailure");
        exit();   
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $stmtResult = mysqli_stmt_get_result($stmt);

    if ($row =mysqli_fetch_assoc($stmtResult)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function emailUsed($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailure");
        exit();   
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $stmtResult = mysqli_stmt_get_result($stmt);

    if ($row =mysqli_fetch_assoc($stmtResult)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createUser($conn, $email, $username, $pwd) {
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailure");
        exit();   
    }

    $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $hashpwd, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?error=none");
    exit();
}
function emptyLoginInput($username, $pwd) {
    $result = false;

    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
    $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    $loginExists = eitherExists($conn, $username, $username);

    if ($loginExists === false) {
        header("location: ../login.php?error=incorrectlogin");
        exit();
    } 

    $pwdHash = $loginExists["password"];
    $checkPwd = password_verify($pwd, $pwdHash);

    if ($checkPwd === false) {
        header("location: ../login.php?error=incorrectlogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userID"] = $loginExists["id"];
        $_SESSION["username"] = $loginExists["username"];
        createUserDir($_SESSION["userID"]);
        header("location: copySettings.inc.php");
        exit();
    }
}
function getUID($conn, $username) {
	   $sql = "SELECT id FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailure");
        exit();   
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $stmtResult = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($stmtResult);
    
    $uid = $row['id'];
    mysqli_stmt_close($stmt);
	return $uid;
	
}
function createUserDir($uid) {
    if(!file_exists("../userdata/users/$uid")) {
        if(!mkdir("../userdata/users/$uid")) {
            die("Failed to create user directory.");
        }
    }
}


function writeToFile($path, $toBeWritten, $uid) {
    $file = fopen($path,"w");
    fwrite($file, $toBeWritten);
    fclose($file);
}

