<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Home";

#Variable that is used to set the meta description of the page.
$PageDesc = "A Short Descrption";

function customPageHeader()
{ ?>
  <!-- Place custom HTML for the head tag here -->
  <link rel="stylesheet" href="css/index.css" />

<?php }
include_once('template/header.php');
?>

<form action="POST" class="search">
  <input type="text" id="search-bar" class="search-bar" placeholder="Search..." /><input type="submit" class="search-button" value="Search">
</form>

<div class="filter">
  <label for="dropdown" id="dropdown-label">Filter +</label>
  <input type="checkbox" name="dropdown" class="dropdown" id="dropdown" autocomplete="off" onclick="toggleFilterDropdown(this)" />
  <ul class="filter-content">
    <li>Lorem ipsum</li>
  </ul>
</div>

<div class="content">
  <div class="item">
    <a class="main-image" href="item.php">
      <img src="shirtpic.jpg" alt="Shirt Picture" class="active-image" />
    </a>
    <div class="item-content">
      <div class="top">
        <a href="item.php" class="item-name">T-Shirts</a>
      </div>
      <p class="description">
        Men and Woman's T-Shirts, Casual Fitting and come in many sizes and colors
      </p>
      <h3>Price: $18.00</h3>
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
      <p class="description">
        Men and Woman's Sweatshirts, Casual Fitting and come in many sizes and colors
      </p>
      <h3>Price: $28.00</h3>
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
      <p class="description">
        Men and Woman's Pants, Casual Fitting and come in many sizes and colors
      </p>
      <h3>Price: $30.00</h3>
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
      <p class="description">
        Men and Woman's T-Shirts, Casual Fitting and come in many sizes and colors
      </p>
      <h3>Price: $8.00</h3>
      <!-- <button class="button-shirt">Buy Now!</button> -->
    </div>
  </div>
</div>

<script src="scripts/script.js"></script>

<?php include_once('template/footer.php');