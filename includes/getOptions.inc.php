<?php
// Connect to DB and get helpers
require_once 'pdo.inc.php';
class Option extends DBH {
    function getColorOptionsByItemID($itemID) { 
        $conn = $this->connect();

        $sql = "SELECT * FROM item_options WHERE item_id = :itemID AND type = 'color';";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':itemID', $itemID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, "Option");
    }

    function getSizeOptionsByItemID($itemID) { 
        $conn = $this->connect();

        $sql = "SELECT * FROM item_options WHERE item_id = :itemID AND type = 'size';";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':itemID', $itemID, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, "Option");
    }
}