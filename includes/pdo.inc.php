<?php
require_once "functions.inc.php";

class DBH {
    private $serverName = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName = "invdb";
    private $charset = "utf8mb4";

    public function connect() { 
        //Handles the initial connection to the server



        try {
            $dsn = "mysql:host=".$this->serverName.";dbname=".$this->dbName.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            logToConsole("Connected to ".$this->dbName." Successfuly"); // Announces a successful connection to the database
            return $pdo;
        } catch (Exception $e) {
            $error = "Connection Failed: ".$e->getMessage();
            logError($error);
            return null;
        }
    }
} 