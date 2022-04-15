<?php 
include_once "template/header.php";

echo $twig->render("test.html", [
    "name" => "John"
]);