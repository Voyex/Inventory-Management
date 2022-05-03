<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/profile.css" />

<?php }
include_once('template/header.php');
// Object that can be used to get users and related data.
include_once('includes/getUser.inc.php');

$obj = new User();
$userID = $_SESSION['userID'];

$user = $obj->getUserByID($userID)[0];
$payments = $obj->getUserPaymentMethods($userID);
$addresses = $obj->getAddressesByUserID($userID);
foreach($payments as $paymentIndex => $payment) {
    $billing_id = $payment->billing_address_id;

    $address = $obj->getAddressByID($billing_id)[0];
    
    $payment->{'address'} = $address;
}

// This renders "!template.html" from the views folder.
echo $twig->render("profile.html", [
  "user" => $user,
  "payments" => $payments,
  "addresses" => $addresses
]);


include_once('template/footer.php');
// Dont place any code here