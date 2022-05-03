<?php
require_once "pdo.inc.php";

/**
 * deletes an item from the database.
 * 
 * @param number $itemID The ID of the item to remove
 * @return boolean TRUE if the item was removed successfully, FALSE otherwise
 */
function deleteAddress($addressID) { 
    $dbh = new DBH; // database handler
    $conn = $dbh->connect(); // database connection

    // Uses a prepared statement to delete the item
    $sql = "DELETE FROM address WHERE id = :addressID";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':addressID', $addressID, PDO::PARAM_STR);
    
    return $stmt->execute();
}

// If an itemID is specified, remove it from the database.
if(isset($_GET['id'])) {
    if (deleteAddress($_GET['id'])) {
        header("Location: ../profile.php?error=none");
        exit();
    } else {
        header("Location: ../profile.php?error=itemnotremoved");
        exit();
    }
} else {
    header('Location: ../profile.php?error=itemIDRequired');
    exit();
}