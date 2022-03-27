<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Edit Profile";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/index.css" />

<?php }
include_once('template/header.php');
?>

<!-- HTML goes here 
Note: Don't add body or head tags as they are in the header 
and are closed in the footer. Pretend they already exist.-->
<div class="container">
  <h2>Edit Profile</h2>
  <form method="post" action="">
    <div class="form-group">
      <label for="emailField">Email</label>
      <input type="text" name="email" class="form-control" id="emailField">
    </div>
    <div class="form-group">
      <label for="billingAddressField">Billing Address</label>
      <input type="text" name="billingAddress" class="form-control" id="billingAddressField">
    </div>
    <div class="form-group">
      <label for="shippingAddressField">Billing Address</label>
      <input type="text" name="shippingAddress" class="form-control" id="shippingAddressField">
    </div>
      <input type="hidden" name="hidden_id">
      <button type="submit" name="updateProfileBtn">Update Profile</button>
  </form>
</div>

<?php include_once('template/footer.php');
// Dont place any code here