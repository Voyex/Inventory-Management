<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
    <!-- Place additional HTML for the head tag here -->
    <link rel="stylesheet" href="css/index.css" />

<?php }
include_once('template/header.php');
?>

<div class="container">
    <div id="info">
        <h1>Cart</h1>

        <!--<a href="">Update Profle</a>-->
    </div>
</div>
<!-- HTML goes here 
Note: Don't add body or head tags as they are in the header 
and are closed in the footer. Pretend they already exist.-->

<?php include_once('template/footer.php');
// Dont place any code here