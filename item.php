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

$colors = $optionObj->getColorOptionsByItemID($_GET['id']);
$sizes = $optionObj->getSizeOptionsByItemID($_GET['id']);

$item = $obj->getItemByID($_GET['id']);
$images = $obj->getImageByItemID($_GET['id']);
$quantity = $obj->getTotalQty($_GET['id']);

// This renders "!template.html" from the views folder.
echo $twig->render("item.html", [
  "item" => $item,
  "images" => $images,
  "quantity" => $quantity,
  "colors" => $colors,
  "sizes" => $sizes,
]);


include_once('template/footer.php');
// Dont place any code here