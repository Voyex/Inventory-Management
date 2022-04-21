<?php    
    // Connect to DB and get helpers
    require_once 'pdo.inc.php';
    require_once 'functions.inc.php';

    class item {}

    $items = getAllItems($pdo);
