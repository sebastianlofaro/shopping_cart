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
    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $cartItem => $quantity) {
        $cartItems[] = array( "product"=>Product::getProductByID($cartItem), "quantity"=>$quantity );
      }
      return $cartItems;
    }
  }

  public static function cartSubTotal() {
    $cartItems = self::contents();
    $total = 0;
    foreach ($cartItems as $key => $value) {
      $total = $total + ($value['product']->price * $value['quantity']);
    }
    $total = round($total, 2);
    return $total;
  }

  public static function cartHTML() {
    $cartItems = self::contents();
    $html = "<ul id='cart-list'>";
    foreach ($cartItems as $key => $value) {
      $html = $html . "<li>" . "<div style='display:none;' class='cart-item-id'>" . $value['product']->id . "</div>" . "<div>" . $value['product']->name . "</div>" . "<div> unit cost: " . $value['product']->price . "</div>" . "<div> Quantity: <input class='cart-item-quantity' type='number' min='1' step='1' value='" . $value['quantity'] . "'></div>" . "<div> Cost: " . $value['product']->price * $value['quantity'] . "</div> <button class='remove-cart-item' type='button' name='removeButton'>Remove</button> </li>";
    }
    $html = $html . "</ul>";
    return $html;
  }

  public static function updateCartItem($itemID, $itemQuantity) {
    $_SESSION['cart'][$itemID] = $itemQuantity;
    $cartSubTotal = self::cartSubTotal();
    $cartHTML = self::cartHTML();
    $package = array('cartHTML' => $cartHTML, 'cartSubTotal' => $cartSubTotal);
    return json_encode($package);
  }




}




 ?>
