<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

#Variable that is used to set the meta description of the page.
$PageDesc = "A Short Descrption";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/item.css" />

<?php }
include_once('template/header.php');
?>

<div class="content">
  <div class="images">
    <div class="side-images">
      <img class="small-image" src="images/shirt/white.webp" alt="A White T-Shirt" onmouseover="setActiveImage(this);">
      <img class="small-image" src="images/shirt/black.jpeg" alt="A Black T-Shirt" onmouseover="setActiveImage(this);">
    </div>
    <div class="main-image" id="main-image">
      <img class="active-image" id="active-image" src="images/shirt/white.webp" onclick="displayModal(this.src);">
    </div>
  </div>
</div>

<script src="scripts/item.js"></script>

<?php include_once('template/footer.php');
// Dont place any code here