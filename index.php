
<?php
session_start();
require( "config.php" );
require __DIR__ . '/vendor/autoload.php';
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'otherPage':
    otherPage();
    break;

  case 'products':
    products();
    break;

  case 'viewProduct':
    viewProduct();
    break;

  case 'shoppingCart':
    shoppingCart();
    break;

  default:
    homepage();
    break;
}

function homepage() {
  require( TEMPLATE_PATH . "/home.php");
}

function otherPage() {
  require( TEMPLATE_PATH . "/otherPage.php");
}

function products() {
  $data = Product::getList();
  require( TEMPLATE_PATH . "/products.php");
}

function viewProduct() {
  $data = Product::getProductByID($_GET["productID"]);
  require( TEMPLATE_PATH . "/viewProduct.php" );
}

function shoppingCart() {
  $cartItems = ShoppingCart::contents();
  require( TEMPLATE_PATH . "/shoppingCart.php" );
}



 ?>
