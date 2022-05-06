<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/index.css" />

<?php }
include_once('template/header.php');

// This renders "!template.html" from the views folder.
echo $twig->render("purchase-order.html", []);

include_once('template/footer.php');
// Dont place any code here