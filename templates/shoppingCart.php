<?php require("includes/header.php") ?>
  <div class="shopping-cart container">
    <div class="coverImage"></div>
    <nav>
      <img class="logo" src="media/img/txsLogo.png" alt="">
      <ul>
        <li><a href="?action=home">Home</a></li>
        <li><a href="?action=products">Products</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="?action=shoppingCart">Shopping Cart</a></li>
      </ul>
    </nav>
    <div class="wrapper">
      <h1>Shopping Cart</h1>
      <div class="cart-items-wrapper">
        <?php echo ShoppingCart::cartHTML(); ?>
      </div>
      <div class="checkout-box">
        <div class="">
          <h2 class="cart-subtotal"><?php echo ShoppingCart::cartSubTotal() ?></h2>
        </div>
        <div class="">
          <button type="button" name="button">CHECKOUT</button>
        </div>
      </div>
    </div>










  </div>
<?php include("includes/footer.php") ?>
