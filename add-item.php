<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Add Item";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/index.css" />

<?php }
include_once('template/header.php');
?>

<div class="H-filter">
  <label for="dropdown" id="dropdown-label">Filter &and;</label>
  <input type="checkbox" name="dropdown" class="dropdown" id="dropdown" autocomplete="off" onclick="toggleFilterDropdown(this)" />
  <ul class="filter-content">
    <li>Lorem ipsum</li>
  </ul>
</div>

<form action="" class="search">
  <input type="text" id="search-bar" placeholder="Search..." /><input type="submit" value="Search">
</form>

<div class="H-content">
  <div class="item">
    <a class="main-image" href="item.php">
      <img src="shirtpic.jpg" alt="Shirt Picture" class="active-image" />
    </a>
    <div class="item-content">
      <div class="top">
        <a href="item.php" class="item-name">T-Shirts</a>
      </div>
      <div class="containQty">
        <p>Color =</p>
        <input class="colorText" type="text">
        <p class="padd">Quantity= </p>
        <input class="quantityText" type="text">
        <button class="confirm">Confirm</button>
      </div>
      <div class="containNewQty">
        <p class="description">
          New Quantity =
        </p>
        <input type="0" class="output" disabled>
      </div>
      <!-- <button class="button-shirt">Buy Now!</button> -->
    </div>
  </div>
  <div class="item">
    <a class="main-image" href="item.php">
      <img src="sweatshirt.webp" alt="Shirt Picture" class="active-image" />
    </a>
    <div class="item-content">
      <div class="top">
        <a href="item.php" class="item-name">Sweatshirts</a>
      </div>
      <div class="containQty">
        <p>Color =</p>
        <input class="colorText" type="text">
        <p class="padd">Quantity= </p>
        <input class="quantityText" type="text">
        <button class="confirm">Confirm</button>

      </div>
      <div class="containNewQty">
        <p class="description">
          New Quantity =
        </p>
        <input type="0" class="output" disabled>
      </div>
      <!-- <button class="button-shirt">Buy Now!</button> -->
    </div>
  </div>
  <div class="item">
    <a class="main-image" href="item.php">
      <img src="pants.jpg" alt="Shirt Picture" class="active-image" />
    </a>
    <div class="item-content">
      <div class="top">
        <a href="item.php" class="item-name">Pants</a>
      </div>
      <div class="containQty">
        <p>Color =</p>
        <input class="colorText" type="text">
        <p class="padd">Quantity= </p>
        <input class="quantityText" type="text">
        <button class="confirm">Confirm</button>

      </div>
      <div class="containNewQty">
        <p class="description">
          New Quantity =
        </p>
        <input type="0" class="output" disabled>
      </div>
      <!-- <button class="button-shirt">Buy Now!</button> -->
    </div>
  </div>
  <div class="item">
    <a class="main-image" href="item.php">
      <img src="socks.jpg" alt="Shirt Picture" class="active-image" />
    </a>
    <div class="item-content">
      <div class="top">
        <a href="item.php" class="item-name">Socks</a>
      </div>
      <div class="containQty">
        <p>Color =</p>
        <input class="colorText" type="text">
        <p class="padd">Quantity= </p>
        <input class="quantityText" type="text">
        <button class="confirm">Confirm</button>

      </div>
      <div class="containNewQty">
        <p class="description">
          New Quantity =
        </p>
        <input type="text" class="output" placeholder="0" disabled>
      </div>
      <!-- <button class="button-shirt">Buy Now!</button> -->
    </div>
  </div>
</div>
<!-- HTML goes here 
Note: Don't add body or head tags as they are in the header 
and are closed in the footer. Pretend they already exist.-->

<script src="scripts/script.js"></script>


<?php include_once('template/footer.php');
// Dont place any code here