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
  <div class="filter-content">
    Lorem ipsum
  </div>
</div>

<div class="H-content">
  <div class="item">
    <div class="main-image" >
      <img src="shirtpic.jpg" alt="Shirt Picture" class="active-image" />
    </div>
    <div class="item-content">
      <div class="description">
        <div class="top">
          <h1>T-Shirt</h1>
        </div>
        <div class="middle">
          <h2>Come in many sizes and colors</h2>
        </div>
      </div>
      <div class="shirt-btn">
        <a class="button-shirt">Buy Now!</a>
      </div>
    </div>
  </div>
  <div class="sweatshirts">
    <div class="main-image">
      <img src="sweatshirt1.jpg" alt="Sweatshirt Picture" class="active-image"/>
    </div>
    <div class="description">
      <div class="topSweat">
        <h1>Sweatshirts</h1>
      </div>
      <div class="middle">
        <h2>Come in many sizes and colors</h2>
      </div>
    </div>
    <div class="shirt-btn">
      <a class="button-shirt">Buy Now!</a>
    </div>
  </div>
  <div class="pants">
    <div class="main-image">
      <img src="pants.jpg" alt="Sweatshirt Picture" class="active-image"/>
    </div>
    <div class="description">
      <div class="topSweat">
        <h1>Pants</h1>
      </div>
      <div class="middle">
        <h2>Come in many sizes and colors</h2>
      </div>
    </div>
    <div class="shirt-btn">
      <a class="button-shirt">Buy Now!</a>
    </div>
  </div>
  <div class="socks">
    <div class="main-image">
      <img src="socks.jpg" alt="Sweatshirt Picture" class="active-image"/>
    </div>
    <div class="description">
      <div class="topSweat">
        <h1>Socks</h1>
      </div>
      <div class="middle">
        <h2>Come in many sizes and colors</h2>
      </div>
    </div>
    <div class="shirt-btn">
      <a class="button-shirt">Buy Now!</a>
    </div>
  </div>
</div>

<script src="scripts/script.js"></script>


<?php include_once('template/footer.php');