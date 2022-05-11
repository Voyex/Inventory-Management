<?php
// Connect to DB and get helpers
require_once 'pdo.inc.php';
class Store extends DBH {

    public function getAllStores() { 
        try {
            $conn = $this->connect();

            $sql = "SELECT * FROM store ORDER BY name;";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, 'Store');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getFirstStoreID() {
        try {
            $conn = $this->connect();

            $sql = "SELECT id FROM store LIMIT 1;";
            return $conn->query($sql)->fetch()[0];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}