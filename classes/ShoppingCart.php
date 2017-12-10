<?php
/**
 *
 */
class ShoppingCart
{

  private $itemID = null;
  private $itemQuantity = null;
  private $cartItems = array();


  function __construct($data=array())
  {
    if (isset($data['itemID'])) $this->itemID = $data['itmeID'];
    if (isset($data['itemQuantity'])) $this->itemQuantity = $data['itmeQuantity'];
  }

  public static function storeCartValues($cartValues) {
    $this->__construct($cartValues);
  }

  public static function addItemToCartWithQuantity( $item, $quantity ) {
    $_SESSION['cart'][$item] = $quantity;
  }

  public static function numberOfTypesOfItemsInCart() {
    return count( $_SESSION['cart'] );
  }

  public static function contents() {
    //return Product::getProductByID($cartItem);
    foreach ($_SESSION['cart'] as $cartItem => $quantity) {
      $cartItems[] = Product::getProductByID($cartItem);
    }
    return $cartItems;
  }

  public static function cartSubTotal() {

  }




}




 ?>
