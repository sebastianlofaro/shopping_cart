<?php require("includes/header.php") ?>
  <div class="shopping-cart container">

    <h1>Shopping Cart</h1>

    <ul>
      <?php
      //var_dump($cartItems[0]->imagePath);
      foreach ($cartItems as $key => $value) {
        echo "<li>" . $value->name . "</li>";
      }?>
    </ul>








  </div>
<?php include("includes/footer.php") ?>
