<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
    <!-- Place additional HTML for the head tag here -->
    <link rel="stylesheet" href="css/admin.css" />

<?php }
include_once('template/header.php');
?>

<div class="H-filter">Filter</div>
<div class="H-content">
    <div class="shirts">
        <!--<div class="image">
            <img src="shirtpic.jpg" alt="Shirt Picture" />
        </div>-->
        <div class="description">
            <div class="topSweat">
                <h2>Shirts</h1>
            </div>
            <div class="middle">
                <h2>What color quantity do you want to change?</h2>
                <input type="text" class="sweat-qty" placeholder="Item color">
                <h3>Quantity:</h2>
                    <h2>New Quantity?</h2>
                    <input type="text" class="sweat-qty" placeholder="Quantity">
            </div>
        </div>
        <div class="shirt-btn">
            <button class="button-shirt">Confirm Change</button>
        </div>
    </div>
    <div class="sweatshirts">
        <!--<div class="sweatshirt-image">
            <img src="sweatshirt1.jpg" alt="Sweatshirt Picture" />
        </div>-->
        <div class="description">
            <div class="topSweat">
                <h2>Sweatshirts</h1>
            </div>
            <div class="middle">
                <h2>What color quantity do you want to change?</h2>
                <input type="text" class="sweat-qty" placeholder="Item color">
                <h3>Quantity:</h3>
                <h2>New Quantity?</h2>
                <input type="text" class="sweat-qty" placeholder="Quantity">
            </div>
        </div>
        <div class="shirt-btn">
            <button class="button-shirt">Confirm Change</button>
        </div>
    </div>
    <div class="pants">
        <!--<div class="sweatshirt-image">
            <img src="pants.jpg" alt="Sweatshirt Picture" />
        </div>-->
        <div class="description">
            <div class="topSweat">
                <h2>Pants</h1>
            </div>
            <div class="middle">
                <h2>What color quantity do you want to change?</h2>
                <input type="text" class="sweat-qty" placeholder="Item color">
                <h3>Quantity:</h2>
                    <h2>New Quantity?</h2>
                    <input type="text" class="sweat-qty" placeholder="Quantity">
            </div>
        </div>
        <div class="shirt-btn">
            <button class="button-shirt">Confirm Change</button>
        </div>
    </div>
    <div class="socks">
        <!--<div class="sweatshirt-image">
            <img src="socks.jpg" alt="Sweatshirt Picture" />
        </div>-->
        <div class="description">
            <div class="topSweat">
                <h2>Socks</h1>
            </div>
            <div class="middle">
                <h2>What color quantity do you want to change?</h2>
                <input type="text" class="sweat-qty" placeholder="Item color">
                <h3>Quantity:</h2>
                    <h2>New Quantity?</h2>
                    <input type="text" class="sweat-qty" placeholder="Quantity">
            </div>
        </div>
        <div class="shirt-btn">
            <button class="button-shirt">Confirm Change</button>
        </div>
    </div>
</div>
<!-- HTML goes here 
Note: Don't add body or head tags as they are in the header 
and are closed in the footer. Pretend they already exist.-->

<?php include_once('template/footer.php');
// Dont place any code here