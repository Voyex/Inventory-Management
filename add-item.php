<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/add-item-form.css" />

<?php }
include_once('template/header.php');
if (!isset($_GET['storeID'])) {
  header('Location: admin.php?error=redierecterror');
  exit();
}

// This renders "!template.html" from the views folder.
echo $twig->render("add-item.html", [
  
]);

include_once('template/footer.php');
// Dont place any code here