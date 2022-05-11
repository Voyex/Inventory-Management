<?php
require_once "pdo.inc.php";

/**
 * deletes an item from the database.
 * 
 * @param number $itemID The ID of the item to remove
 * @return boolean TRUE if the item was removed successfully, FALSE otherwise
 */
function updateQuantity($storeItemID) { 
    $dbh = new DBH; // database handler
    $conn = $dbh->connect(); // database connection

    // Uses a prepared statement to delete the item
    try {
        $sql = "UPDATE store_item SET quantity = :quantity WHERE id = :store_item_id;";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':quantity', $_POST['quantity'], PDO::PARAM_STR);
        $stmt->bindValue(':store_item_id', $storeItemID, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        logError($e->getMessage());
        die($e->getMessage());
    }
}

// If an itemID is specified, remove it from the database.
if(isset($_GET['id']) && isset($_POST['quantity'])) {
    echo "here";
    if (updateQuantity($_GET['id'])) {
        header("Location: ../admin.php?error=none");
        exit();
    } else {
        header("Location: ../admin.php?error=itemnotupdated");
        exit();
    }
} else {
    header('Location: ../admin.php?error=missingData');
    exit();
}