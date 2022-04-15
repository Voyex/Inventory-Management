<?php
#Variable that is used to set the title of the page.
$PageTitle = "Inv Manager - Template";

function customPageHeader()
{ ?>
  <!-- Place additional HTML for the head tag here -->
  <link rel="stylesheet" href="css/index.css" />

<?php }
include_once('template/header.php');

// // Variables go here
$name = "John Doe";
$favoriteFoods = array(
  0=>"Pizza",
  1=>"Ice Cream"
);

// This renders "!template.html" from the views folder.
echo $twig->render("!template.html", [
  "name" => $name,
  "favoriteFoods" => $favoriteFoods
]);

/* You can render multiple templates so try and break things up
 * into smaller parts so we can have reusable moduels
 */
echo $twig->render('!template.html', [
  "name" => $name,
  "favoriteFoods" => $favoriteFoods
]);


include_once('template/footer.php');
// Dont place any code here