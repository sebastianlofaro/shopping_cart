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








});
