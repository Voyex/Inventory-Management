<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/index.css" />

<?php }
include_once('template/header.php');

// Gets all the items into a variable.
include_once("includes/getItems.inc.php");

$item = new Item;

$search = $_POST['search']; //Gets the search value

// Loads itms that fit the search parameters
if (isset($search)) {
  $items = $item->getSearchedItems($search);
} else {
  $items = $item->getAllItems();
}

foreach($items as $item) {
  $item->description = strip_tags($item->description);
}

$images = $item->getPrimaryImages();

// This renders "!template.html" from the views folder.
echo $twig->render("index.html", [
  "items" => $items,
  "images" => $images,
  "search" => $search
]);


include_once('template/footer.php');
// Dont place any code here