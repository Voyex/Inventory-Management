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
if(isset($_POST['storeID'])) {
    $selectedStoreID = $_POST['storeID'];
} else {
    $selectedStoreID = $storeObj->getFirstStoreID();
}

$items = $itemObj->getAllStoreItems($selectedStoreID);
$stores = $storeObj->getAllStores();

// turns the options into a JSON object.
try {
    foreach ($items as $itemIndex => $item) {
        $item->options = json_decode($item->options);
    }
} catch (Exception $e) {
    die($e->getMessage());
}


// This renders "!template.html" from the views folder.
echo $twig->render("admin.html", [
    "items" => $items,
    "stores" => $stores,
    "selectedStoreID" => $selectedStoreID,
]);

include_once('template/footer.php');
// Dont place any code here