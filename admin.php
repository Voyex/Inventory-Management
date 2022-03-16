<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Admin Tools";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/admin.css" />

<?php }
include_once('template/header.php');
?>

<div class="table-container">
  <form action="">
    <table class="item-table">
      <tr>
        <th>SKU</th>
        <th>Name</th>
        <th>MSRP ($)</th>
        <th>Purchase Price ($)</th>
        <th>In Stock Qty.</th>
        <th>Incoming Qty.</th>
        <th>Outgoing Qty.</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <tr>
        <td class="sku">ABC123</td>
        <td class="title">T-Shirt</td>
        <td class="msrp">25.00</td>
        <td class="purchase-price">18.00</td>
        <td class="in-stock" contenteditable="true">7</td>
        <td class="incoming">41</td>
        <td class="outgoing" contenteditable="true">2</td>
        <td><button>Edit</button></td>
        <td><button>Delete</button></td>
      </tr>
      <tr>
        <td>A3B2C1</td>
        <td>Jeans</td>
        <td>35.00</td>
        <td>28.00</td>
        <td>3</td>
        <td>19</td>
        <td>0</td>
        <td><button>Edit</button></td>
        <td><button>Delete</button></td>
      </tr>
      <tr>
        <td>A1B1C1</td>
        <td>Sweatshirts</td>
        <td>40.00</td>
        <td>30.00</td>
        <td>13</td>
        <td>32</td>
        <td>1</td>
        <td><button>Edit</button></td>
        <td><button>Delete</button></td>
      </tr>
      <tr>
        <td>A2B2C2</td>
        <td>Socks</td>
        <td>12.00</td>
        <td>8.00</td>
        <td>34</td>
        <td>21</td>
        <td>0</td>
        <td><button>Edit</button></td>
        <td><button>Delete</button></td>
      </tr>

    </table>
  </form>
</div>

<!-- HTML goes here 
Note: Don't add body or head tags as they are in the header 
and are closed in the footer. Pretend they already exist.-->

<script src="scripts/script.js"></script>

<?php include_once('template/footer.php');
// Dont place any code here