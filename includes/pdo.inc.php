<?php
require_once "functions.inc.php";
//Handles the initial connection to the server

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "invdb";
$charset = "utf8mb4";

try {
    $dsn = "mysql:host=".$serverName.";dbname=".$dbName.";charset=".$charset;
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    logToConsole("Connected to ".$dbName." Successfuly"); // Announces a successful connection to the database
} catch (Exception $e) {
    $error = "Connection Failed: ".$e->getMessage();
    logError($error);
} 