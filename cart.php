<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
    <!-- Place additional HTML for the head tag here -->
    <link rel="stylesheet" href="css/cart.css" />

<?php }
include_once('template/header.php');
?>

<div class="container">
    <div id="info">
        <h1>Cart</h1>
        <!--<a href="">Update Profle</a>-->
    </div>
    <div class="items">
        <table>
            <tr>
                <th>Item</th>
                <th>Color</th>
                <th>Sku Number</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Remove</th>
            </tr>
            <tr>
                <td>T-Shirt</td>
                <td>Black</td>
                <td>324654</td>
                <td>$15</td>
                <td>2</td>
                <td><a href="includes/removeCartItem.inc.php">Remove</a></td>
            </tr>
            <tr>
                <td>Sweatshirt</td>
                <td>Blue</td>
                <td>534631</td>
                <td>$25</td>
                <td>1</td>
                <td><a href="includes/removeCartItem.inc.php">Remove</a></td>
            </tr>
            <tr>
                <td>Jeans</td>
                <td>Blue</td>
                <td>342523</td>
                <td>$20</td>
                <td>4</td>
                <td><a href="includes/removeCartItem.inc.php">Remove</a></td>
            </tr>
            <tr>
                <td>Socks</td>
                <td>White</td>
                <td>123754</td>
                <td>$10</td>
                <td>5</td>
                <td><a href="includes/removeCartItem.inc.php">Remove</a></td>
            </tr>
        </table>
        <h1>Total = $185</h1>
        <button class="cart-btn">Checkout</button>
    </div>
</div>
<!-- HTML goes here 
Note: Don't add body or head tags as they are in the header 
and are closed in the footer. Pretend they already exist.-->

<?php include_once('template/footer.php');
// Dont place any code here