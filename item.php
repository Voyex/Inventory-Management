<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Item";

#Variable that is used to set the meta description of the page.
$PageDesc = "A Short Descrption";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/item.css" />

<?php }
include_once "template/header.php";
// Object that can be used to get items and related data.
include_once('includes/getItems.inc.php');
include_once('includes/getOptions.inc.php');

// Variables go here
$obj = new Item;
$optionObj = new Option;

// $colors = $optionObj->getColorOptionsByItemID($_GET['id']);
// $sizes = $optionObj->getSizeOptionsByItemID($_GET['id']);

$item = $obj->getItemByID($_GET['id']);
$images = $obj->getImageByItemID($_GET['id']);
$colorOptions = $obj->getItemOptionsByID($_GET['id']);

$selectedColor = "";
$selectedSize = "";
if(isset($_POST['color']) || isset($_POST['size'])) {
  try {
    $selectedColor = $_POST['color'];
  } catch(Exception $e) {
    logToConsole($e->getMessage());
  }
  try {
    $selectedSize = $_POST['size'];
  } catch(Exception $e) {
    logToConsole($e->getMessage());
  }
  $itemOptions = $obj->getMatchingItemOptionsByID($_GET['id'], $selectedColor);

  $tempSizes = array();
  foreach ($itemOptions as $index => $itemOption) {
    $optionsJSON = json_decode($itemOption->options);
  
    if (!in_array($optionsJSON->{'size'}, $tempSizes)) {
      $tempSizes[] = $optionsJSON->{'size'};
    }
  }
  if (!in_array($selectedSize, $tempSizes)) {
    $selectedSize = $tempSizes[0];
  }

  $quantity = $obj->getTotalQTYMatchingOptions($_GET['id'], $selectedColor, $selectedSize);
} else {
  $itemOptions = $obj->getItemOptionsByID($_GET['id']);
  $quantity = $obj->getTotalQty($_GET['id']);
}
$colors = array();
$sizes = array();

$i = 0;
foreach ($itemOptions as $index => $itemOption) {
  $optionsJSON = json_decode($itemOption->options);

  if (!in_array($optionsJSON->{'size'}, $sizes)) {
    $sizes[] = $optionsJSON->{'size'};
  }
}

foreach ($colorOptions as $index => $colorOption) {
  $colorsJSON = json_decode($colorOption->options);

  if (!in_array($colorsJSON->{'color'}, $colors)) {
    $colors[] = $colorsJSON->{'color'};
  }
}


// This renders "!template.html" from the views folder.
echo $twig->render("item.html", [
  "item" => $item,
  "images" => $images,
  "quantity" => $quantity,
  "colors" => $colors,
  "sizes" => $sizes,
  "currentColor" => $selectedColor,
  "currentSize" => $selectedSize
]);


include_once('template/footer.php');
// Dont place any code here