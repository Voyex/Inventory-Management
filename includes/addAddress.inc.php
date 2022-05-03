<?php
require_once "pdo.inc.php";
session_start();

/**
 * deletes an item from the database.
 * 
 * @param number $itemID The ID of the item to remove
 * @return boolean TRUE if the item was removed successfully, FALSE otherwise
 */
function addAddress($userID) { 
    $dbh = new DBH; // database handler
    $conn = $dbh->connect(); // database connection

    // Uses a prepared statement to delete the item
    try {
    $sql = "INSERT INTO address(user_id, nickname, name, street1, street2, city, state, zipCode, country, phone) VALUES(:userID, :nickname, :name, :street1, :street2, :city, :state, :zip, :country, :phone)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':userID', $userID, PDO::PARAM_STR);
    $stmt->bindValue(':nickname', $_POST['nickname'], PDO::PARAM_STR);
    $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindValue(':street1', $_POST['street1'], PDO::PARAM_STR);
    $stmt->bindValue(':street2', $_POST['street2'], PDO::PARAM_STR);
    $stmt->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
    $stmt->bindValue(':state', $_POST['state'], PDO::PARAM_STR);
    $stmt->bindValue(':zip', $_POST['zip'], PDO::PARAM_STR);
    $stmt->bindValue(':country', $_POST['country'], PDO::PARAM_STR);
    $stmt->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
    
    $stmt->execute();
    } catch (Exception $e) {
        die ($e->getMessage());
    }
    return true;
}

// If a userID exists, add an address for that user
if(isset($_SESSION['userID'])) {
    if (addAddress($_SESSION['userID'])) {
        header("Location: ../profile.php?error=none");
        exit();
    } else {
        header("Location: ../profile.php?error=addressnotadded");
        exit();
    }
} else {
    header('Location: ../profile.php?error=redierecterror');
    exit();
}
