<?php
ini_set( "display_errors", true );
date_default_timezone_set( "America/Chicago" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=txsmoke" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "root" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "IMAGE_PATH", "media/img/" );
require ( CLASS_PATH . "/CartItem.php" );
require ( CLASS_PATH . "/ShoppingCart.php" );
require ( CLASS_PATH . "/Product.php" );

function handleException( $exception ) {
  echo $exception;
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );





 ?>
