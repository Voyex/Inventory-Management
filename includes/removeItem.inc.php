<?php
require_once "pdo.inc.php";

/**
 * deletes an item from the database.
 * 
 * @param number $itemID The ID of the item to remove
 * @return boolean TRUE if the item was removed successfully, FALSE otherwise
 */
function deleteItem($itemID) { 
    $dbh = new DBH; // database handler
    $conn = $dbh->connect(); // database connection

    // Uses a prepared statement to delete the item
    $sql = "DELETE FROM item WHERE itemID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $itemID, PDO::PARAM_STR);
    
    return $stmt->execute();
}

// If an itemID is specified, remove it from the database.
if(isset($_GET['id'])) {
    if (deleteItem($_GET['id'])) {
        header("Location: ../admin.php?error=none");
        exit();
    } else {
        header("Location: ../admin.php?error=itemnotremoved");
        exit();
    }
} else {
    header('Location: ../admin.php?error=itemIDRequired');
    exit();
}