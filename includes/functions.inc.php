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
function emptySingupInput($email, $pwd, $pwdRepeat) {
    $result = null;

    if (empty($email) || empty($pwd) || empty($pwdRepeat)) {
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
    $sql = "SELECT * FROM user
     WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailure2");
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
    $sql = "SELECT * FROM user WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailure3");
        exit();   
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
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

function emailUsed($conn, $email) {
    $sql = "SELECT * FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailure4");
        exit();   
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
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


function createUser($conn, $email, $pwd) {
    $sql = "INSERT INTO user (password, email) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailure1");
        exit();   
    }

    $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $hashpwd, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?error=none");
    exit();
}
function emptyLoginInput($email, $pwd) {
    $result = false;

    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
    $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pwd) {
    $loginExists = emailUsed($conn, $email);

    if ($loginExists === false) {
        header("location: ../login.php?error=incorrectlogin");
        exit();
    } 

    $pwdHash = $loginExists["password"];
    $checkPwd = password_verify($pwd, $pwdHash);

    if ($checkPwd === false) {
        header("location: ../login.php?error=incorrectlogin");
        exit();
    } 
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userID"] = $loginExists["id"];
        $_SESSION["email"] = $loginExists["email"];
        header("location: ../index.php?error=none");
        exit();
    }
}
function getUID($conn, $email) {
	$sql = "SELECT id FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailure");
        exit();   
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    $stmtResult = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($stmtResult);
    
    $uid = $row["id"];
    mysqli_stmt_close($stmt);
	return $uid;
	
}

function getHello() { 
    echo "Hello";
}

/**
 * gets a list of all items
 * 
 * @param conn The connection to the sql query
 * @return rows array of items in the database.
 */

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

function logToConsole($message) {
    echo "<script>";
    echo "console.log(\"".$message."\");";
    echo "</script>";
}

function logError($message) {
    echo "<script>";
    echo "console.error(\"".$message."\");";
    echo "</script>";
}

