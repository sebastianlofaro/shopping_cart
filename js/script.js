$(document).ready(function() {


  console.log('Hi Sebastian');

  $("#bake-cookie-btn").on("click", function(e) {
    console.log('COOKIE!');
    $.ajax({
      url: 'oven.php',
      type: 'post',
      data: {'action': 'bakeCookie', 'cookie': 'Snickerdoodle'},
      success: function(data, status) {
        console.log(data);
      }
    });
  });

  $("#add-item-btn").on("click", function(e) {
    console.log('Add Item');
    var $cookieNumber = $('#item-input').val();
    $.ajax({
      url: 'oven.php',
      type: 'post',
      data: {'action': 'addItem', 'itemNumber': $cookieNumber},
      success: function(data, status) {
        console.log(data);
      }
    });
  });

  $("#delete-cookies-btn").on("click", function(e) {
    console.log('COOKIE!');
    $.ajax({
      url: 'oven.php',
      type: 'post',
      data: {'action': 'deleteCookies'},
      success: function(data, status) {
        console.log(data);
      }
    });
  });

  $("#smell-cookies-btn").on("click", function(e) {
    console.log('YUM!');
    $.ajax({
      url: 'oven.php',
      type: 'post',
      data: {'action': 'smellCookies'},
      success: function(data, status) {
        console.log(data);
        //console.log($.parseJSON(data));
      }
    });
  });


  $(".addToCartButton").on("click", function(e) {
    console.log('Add To Cart');
    var $itemID = $(this).attr('id');
    var $itemQuantity = $('#quantity').val();
    $.ajax({
      url: 'oven.php',
      type: 'post',
      data: {'action': 'addToCart', 'itemID': $itemID, 'itemQuantity': $itemQuantity},
      success: function(data, status) {
        console.log(data);
        //console.log($.parseJSON(data));
      }
    });
  });


  $(".cart-items-wrapper").on("change", ".cart-item-quantity", function(e) {
    console.log('Change cart item quantity');
    var $itemID = $(this).parent().parent().children('.cart-item-id').html();
    var $itemQuantity = $(this).val();

    function updatePage(cartHTML, cartSubtotal) {
      $('.cart-items-wrapper').html(cartHTML);
      $('.cart-subtotal').html(cartSubtotal);
    }

    //console.log($(this).parent().parent().children('.cart-item-id').html());
    $.ajax({
      url: 'oven.php',
      type: 'post',
      data: {'action': 'updateCartItem', 'itemID': $itemID, 'itemQuantity': $itemQuantity},
      success: function(data, status) {
        //console.log(data);
        //console.log($.parseJSON(data));
        var $data = $.parseJSON(data);
        updatePage($data.cartHTML, $data.cartSubTotal);
        console.log($data.cartSubTotal);
      }
    });
  });








});
