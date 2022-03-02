<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Home";

#Variable that is used to set the meta description of the page.
$PageDesc = "A Short Descrption";

function customPageHeader()
{ ?>
  <!-- Place custom HTML for the head tag here -->
  <link rel="stylesheet" href="css/index.css" />

<?php }
include_once('template/header.php');
?>

<div>Hello World</div>

<?php include_once('template/footer.php');