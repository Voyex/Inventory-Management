<?php
require_once "pdo.inc.php";

/**
 * deletes an item from the database.
 * 
 * @param number $itemID The ID of the item to remove
 * @return boolean TRUE if the item was removed successfully, FALSE otherwise
 */
function updateQuantity($storeID, $itemID) { 
    $dbh = new DBH; // database handler
    $conn = $dbh->connect(); // database connection

    // Uses a prepared statement to delete the item
    $sql = "UPDATE store_item SET quantity = :quantity WHERE item_id = :itemID AND store_id = :storeID";
    $stmt = $conn->prepare($sql);
    echo "here 0.1";
    $stmt->bindValue(':quantity', $_POST['quantity'], PDO::PARAM_STR);
    $stmt->bindValue(':itemID', $itemID, PDO::PARAM_STR);
    $stmt->bindValue(':StoreID', $storeID, PDO::PARAM_STR);
    echo "here 0.2";
    return $stmt->execute();
}

// If an itemID is specified, remove it from the database.
if(isset($_GET['itemID']) && isset($_GET['storeID']) && isset($_POST['quantity'])) {
    echo "here";
    if (updateQuantity($_GET['storeID'], $_GET['itemID'])) {
        echo "here1";
        header("Location: ../admin.php?error=none");
        exit();
    } else {
        header("Location: ../admin.php?error=itemnotremoved");
        exit();
    }
} else {
    header('Location: ../admin.php?error=missingData');
    exit();
}