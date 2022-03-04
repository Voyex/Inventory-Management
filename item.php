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
      <img class="small-image" src="images/shirt/white.jpeg" alt="A White T-Shirt" onmouseover="setActiveImage(this);">
      <img class="small-image" src="images/shirt/black.jpeg" alt="A Black T-Shirt" onmouseover="setActiveImage(this);">
      <img class="small-image" src="images/shirt/wide-white.jpg" alt="A Black T-Shirt" onmouseover="setActiveImage(this);">
    </div>
    <div class="main-image" id="main-image">
      <img class="active-image" id="active-image" onclick="displayModal(this.src);">
    </div>
  </div>

  <div class="item-info">
    <div class="title">A Plain T-Shirt</div> 
    <div class="stock-counter" id="stock-counter">
      <div class="stock-number" id="stock-number">12</div>
      <div>Currently in stock</div>
    </div>

    <div class="restock-counter">
      <div class="restock-number">14</div>
      <div>Day(s) until next restock</div>
    </div>

    <div class="price-container">
      <div>Price: </div><div class="symbol">$</div><div class="price">14.00</div>
    </div>

    <!-- This button needs to call a JS function that will pass the item id to the server which will add it to the cart. 
    Don't forget to update the number of items in the cart counter on click as well. -->
    <div class="cart-container" id="cart-container">
      <button class="cart-incrementor hidden" onclick="addToCart(-1)">-</button>
      <button class="cart" id="cart" onclick="addToCart(1)" contenteditable="false">Add to cart</button>
      <button class="cart-incrementor hidden" onclick="addToCart(1)">+</button>
    </div>
  </div>

  <div class="markup">
    <!-- Make sure to sanitize any input -->
  </div>
</div>

<script src="scripts/item.js"></script>

<?php include_once('template/footer.php');
// Dont place any code here