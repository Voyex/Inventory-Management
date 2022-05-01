<?php
    // Connect to DB and get helpers
    require 'pdo.inc.php';
    class Item extends DBH {

        public function getAllItems() { 
            $conn = $this->connect();

            $sql = "SELECT * FROM item ORDER BY title;";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, 'Item');
        }

        public function getSearchedItems($search) {
            $conn = $this->connect();

            $sql = "SELECT * FROM item WHERE title LIKE :keyword ORDER BY title;";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':keyword', '%'.$search.'%', PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_CLASS, "Item");
        }

        public function getItemByID($id) {
            $conn = $this->connect();

            $sql = "SELECT * FROM item WHERE itemID = $id;";

            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, "Book");
        }

        public function getPrimaryImages() {
            $conn = $this->connect();

            $sql = "SELECT * FROM image WHERE isPrimary = 1;";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, "Item");
        }

        public function getImageByItemID($itemID) {
            $conn = $this->connect();

            $sql = "SELECT * FROM image WHERE item_id = $itemID;";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, "Item"); 
        }
        public function getTotalQty($itemID) {
            $conn = $this->connect();

            $sql = "SELECT SUM(quantity) FROM store_item WHERE item_id = $itemID;";
            return $conn->query($sql)->fetch();
        }
    }