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

<div class="H-filter">Filter</div>
      <div class="H-content">
        <div class="shirts">
          <div class="image">
            <img src="shirtpic.jpg" alt="Shirt Picture" />
          </div>
          <div class="description">
            <div class="top">
              <h1>T-Shirts</h1>
            </div>
            <div class="middle">
              <h2>Come in many sizes and colors</h2>
            </div>
          </div>
          <div class="shirt-btn">
            <button class="button-shirt">Buy Now!</button>
          </div>
        </div>
        <div class="sweatshirts">
          <div class="sweatshirt-image">
            <img src="sweatshirt1.jpg" alt="Sweatshirt Picture" />
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
            <button class="button-shirt">Buy Now!</button>
          </div>
        </div>
        <div class="pants">
          <div class="sweatshirt-image">
            <img src="pants.jpg" alt="Sweatshirt Picture" />
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
            <button class="button-shirt">Buy Now!</button>
          </div>
        </div>
        <div class="socks">
          <div class="sweatshirt-image">
            <img src="socks.jpg" alt="Sweatshirt Picture" />
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
            <button class="button-shirt">Buy Now!</button>
          </div>
        </div>
</div>
</div>

<?php include_once('template/footer.php');