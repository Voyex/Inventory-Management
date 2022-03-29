<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Profile";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/profile.css">

<?php }
include_once('template/header.php');
?>

<!-- HTML goes here 
Note: Don't add body or head tags as they are in the header 
and are closed in the footer. Pretend they already exist.-->
<div class="container">
  <div id="info">
    <h1>Profile</h1>
    <section>
      <table>
        <tr>
          <th>Firstname:</th>
          <td>
            <!--Link to Database-->
          </td>
        </tr>
        <tr>
          <th>Lastname:</th>
          <td>
            <!--Link to Database-->
          </td>
        </tr>
        <tr>
          <th>Email:</th>
          <td>
            <!--Link to Database-->
          </td>
        </tr>
        <tr>
          <th>Billing Address:</th>
          <td>
            <!--Link to Database-->
          </td>
        </tr>
        <tr>
          <th>Shipping Address:</th>
          <td>
            <!--Link to Database-->
          </td>
        </tr>
        <tr>
          <th>Account Type:</th>
          <td>
            <!--Link to Database-->
          </td>
        </tr>
      </table>
    </section>
    <div>
      <button type="submit" name="updateProfileBtn" class="btn btn-primary pull-right">Update Profile</button><br />
      <!--<a href="">Update Profle</a>-->
    </div>
  </div>

  <div class="passwordField">
    <h1>Password Management</h1>
    <form method="post" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label for="currentpassword">Current Password</label>
        <input type="password" name="current_password" class="form-control" id="currentpassword" placeholder="Current Password">
      </div>
      <div class="form-group">
        <label for="newpassword">New Password</label>
        <input type="password" name="new_password" class="form-control" id="newpassword" placeholder="New Password">
      </div>
      <div class="form-group">
        <label for="confirmpassword">Password</label>
        <input type="password" name="confirm_password" class="form-control" id="confirmpassword" placeholder="Confirm new Password">
      </div>
      <input type="hidden" name="hidden_id" value="">
      <input type="hidden" name="hidden_id" value="">
      <button type="submit" name="changePasswordBtn" class="btn btn-primary pull-right">Change Password</button> <br />
    </form>
  </div>
</div>

<?php include_once('template/footer.php');
// Dont place any code here