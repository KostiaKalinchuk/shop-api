<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Europe/Kiev" );
define( "DB_DSN", "mysql:host=localhost;dbname=shop-api;charset=utf8" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "CLASS_PATH", "models" );
define( "TEMPLATE_PATH", "views" );
define( "ADMIN_USERNAME", "Kostia" );
define( "ADMIN_PASSWORD", "12345" );
require( CLASS_PATH . "./Article.php" );
require(CLASS_PATH . "./Category.php");
require(CLASS_PATH . "./Comment.php");
require(CLASS_PATH . "./Order.php");

function handleException( $exception ) {
  echo "Виникла помилка. Спробуйте пізніше.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );

