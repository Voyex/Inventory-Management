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

<div class="H-filter">
  <label for="dropdown" id="dropdown-label">Filter &and;</label>
  <input type="checkbox" name="dropdown" class="dropdown" id="dropdown" autocomplete="off" onclick="toggleFilterDropdown(this)" />
  <ul class="filter-content">
    <li>Lorem ipsum</li>
  </ul>
</div>

<form action="" class="search">
  <input type="text" id="search-bar" placeholder="Search..."/><input type="submit" value="Search">
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
        <p class="description">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatibus voluptatem nesciunt praesentium ullam eos architecto odio perferendis cupiditate numquam amet magni, reiciendis commodi, voluptas eum hic eaque ex neque?
        </p>
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
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatibus voluptatem nesciunt praesentium ullam eos architecto odio perferendis cupiditate numquam amet magni, reiciendis commodi, voluptas eum hic eaque ex neque?
        </p>
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
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatibus voluptatem nesciunt praesentium ullam eos architecto odio perferendis cupiditate numquam amet magni, reiciendis commodi, voluptas eum hic eaque ex neque?
        </p>
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
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatibus voluptatem nesciunt praesentium ullam eos architecto odio perferendis cupiditate numquam amet magni, reiciendis commodi, voluptas eum hic eaque ex neque?
        </p>
        <!-- <button class="button-shirt">Buy Now!</button> -->
    </div>
</div>
</div>

<script src="scripts/script.js"></script>

<?php include_once('template/footer.php');