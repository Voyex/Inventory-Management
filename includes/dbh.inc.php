<?php
require_once "functions.inc.php";
//Handles the initial connection to the server

$serverName = "localhost";
$dbUsername = "root";
$dBPassword = "";
$dBName = "invdb";

//var that stores the mysqli connection info
$conn = mysqli_connect($serverName, $dbUsername, $dBPassword, $dBName);

//Checks that the connection was successful
if (!$conn) {
    header('Location: ../index.php?error=connecterror');
    logError("Connection failed");
    die("Connection failed: " . mysqli_connect_error());
}
