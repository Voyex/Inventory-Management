<?php
require_once "pdo.inc.php";
session_start();

function updateProfile($userID) {
    $dbh = new DBH; // database handler
    $conn = $dbh->connect(); // database connection

    try {
        $sql = "UPDATE user 
        SET first_name = :firstname, last_name = :lastname, email = :email 
        WHERE id = :userID;";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindValue(':userID', $userID, PDO::PARAM_STR);

        return $stmt->execute();
    } catch(Exception $e) {
        die($e->getMessage());
    }
}
if (isset($_SESSION['userID'])) {
    if (updateProfile($_SESSION['userID'])) {
        header('Location: ../profile.php?error=none');
        exit();
    } else {
        header('Location: ../profile.php?error=profileNotUpdated');
        exit();  
    }
} else {
    header('Location: ../profile.php?error=redirecterror');
    exit();
}