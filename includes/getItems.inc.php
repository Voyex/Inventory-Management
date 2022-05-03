<?php
    // Connect to DB and get helpers
    require_once 'pdo.inc.php';
    class Item extends DBH {

        public function getAllItems() { 
            $conn = $this->connect();

            $sql = "SELECT * FROM item ORDER BY title;";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, 'Item');
        }

        public function getAllStoreItems($storeID) {
            $conn = $this->connect();

            $sql = "SELECT * FROM store_item WHERE store_id = :storeID;";
            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':storeID', $storeID, PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_CLASS, "Item");
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

            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, "Item")[0];
        }

        public function getPrimaryImages() {
            $conn = $this->connect();

            $sql = "SELECT * FROM item_image WHERE isPrimary = 1;";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, "Item");
        }

        public function getImageByItemID($itemID) {
            $conn = $this->connect();

            $sql = "SELECT * FROM item_image WHERE item_id = $itemID;";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, "Item"); 
        }

        public function getTotalQty($itemID) {
            $conn = $this->connect();

            $sql = "SELECT SUM(quantity) FROM store_item WHERE item_id = $itemID;";
            return $conn->query($sql)->fetch()[0];
        }

        /**
         * Gets the quantiy of an item at a particular store.
         * 
         * @param int $storeID The id of the store whose quantity you want to check
         * @param int $itemID The id of the item whose you want to check
         * @return int The quantity of the item at that store
         */
        public function getStoreQty($storeID, $itemID) {
            $conn = $this->connect();

            $sql = "SELECT quantity FROM store_item WHERE item_id = :itemID AND store_id = :storeID";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':itemID', $itemID, PDO::PARAM_STR);
            $stmt->bindValue(':storeID', $storeID, PDO::PARAM_STR);
            if(!$stmt->execute()) {
                header("location: ../index.php?error=stmtfailure");
                exit;
            }
    
            return $stmt->fetch()[0];
        }
    }