<?php
// Require this file in pages that you want to be accessible by admins only.
if($_SESSION["userType"] != "admin") {
    header("Location: ../index.php?error=redirecterror");
    exit();
}