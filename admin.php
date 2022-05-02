<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/admin.css" />

<?php }
include_once('template/header.php');
require_once('includes/verifyAdmin.inc.php');
require_once('includes/getItems.inc.php');
include_once('includes/getStore.inc.php');

$itemObj = new Item;
$storeObj = new Store;

// Makes sure that a store is selected otherwise the first store is selected.
if(isset($_GET['storeID'])) {
    $selectedStoreID = $_GET['storeID'];
} else {
    $selectedStoreID = $storeObj->getFirstStoreID();
}

$storeItems = $itemObj->getAllStoreItems($selectedStoreID);
$stores = $storeObj->getAllStores();

$items = array();
// Gets the items that correlate with the store items.
foreach($storeItems as $storeIndex => $storeItem) {
    $items[] = $itemObj->getItemByID($storeItem->item_id);
    end($items)->quantity = $storeItem->quantity; //Adds the quantity to the item
}


// This renders "!template.html" from the views folder.
echo $twig->render("admin.html", [
    "items" => $items,
    "stores" => $stores,
    "selectedStoreID" => $selectedStoreID,
]);

include_once('template/footer.php');
// Dont place any code here