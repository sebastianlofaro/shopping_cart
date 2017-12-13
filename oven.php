<?php

session_start();
require('config.php');

if (!isset($_SESSION['cookies'])) {
  $_SESSION['cookies'] = array();
}

switch ($_POST['action']) {
  case 'bakeCookie':
    echo "New cookie in the oven.";
    $_SESSION['cookies'][] = "NEW COOKIE";
    break;

  case 'smellCookies':
    echo json_encode($_SESSION['cart']);
    break;

  case 'deleteCookies':
    $_SESSION['cart'] = array();
    echo json_encode($_SESSION['cart']);
    break;

  case 'addItem':
    addItemToCart();
    break;

  case 'addToCart':
    addItemToCart();
    break;

  case 'updateCartItem':
    updateCartItem();
    break;

  default:
    echo "Default Response...";
    break;
}



function addItemToCart() {
  $itemNumber = $_POST['itemID'];
  $itemQuantity = $_POST['itemQuantity'];
  ShoppingCart::addItemToCartWithQuantity($itemNumber, $itemQuantity);
}

function updateCartItem() {
  $itemID = $_POST['itemID'];
  $itemQuantity = $_POST['itemQuantity'];
  ShoppingCart::updateCartItem($itemID, $itemQuantity);
  echo ShoppingCart::updateCartItem($itemID, $itemQuantity);
}





 ?>
 
