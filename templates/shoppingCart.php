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


      <ul id="cart-list">
        <?php
        //var_dump($cartItems[0]['product']->name);
        $subtotal = null;
        foreach ($cartItems as $key => $value) {
          echo "<li>" . "<div>" . $value['product']->name . "</div>" . "<div> unit cost: " . $value['product']->price . "</div>" . "<div> Quantity: " . $value['quantity'] . "</div>" . "<div> Cost: " . $value['product']->price * $value['quantity'] . "</div>" . "</li>";
        }

        ?>
      </ul>
    </div>










  </div>
<?php include("includes/footer.php") ?>
