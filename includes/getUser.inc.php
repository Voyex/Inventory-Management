<?php
    // Connect to DB and get helpers
    require 'pdo.inc.php';

    class User extends DBH {
        
        public function getUserByID($userID) {
            $conn = $this->connect();
            
            $sql = "SELECT * FROM user WHERE id = $userID";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, 'User');
        }

        public function getUserPaymentMethods($userID) { 
            $conn = $this->connect();
            
            $sql = "SELECT * FROM payment WHERE user_id = $userID";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, 'User');
        }

        public function getAddressByID($addressID) {
            $conn = $this->connect();
            
            $sql = "SELECT * FROM address WHERE id = $addressID";
            return $conn->query($sql)->fetchAll(PDO::FETCH_CLASS, 'User');
        }
    }