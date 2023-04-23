
<?php
/**
 * Import files from services and register them, because route calls service
 */

require "../vendor/autoload.php";
require "services/UserService.php";
require "services/ProductService.php";

Flight::register('user_service', "UserService");
Flight::register('product_service', "ProductService");

require_once 'routes/UserRoutes.php';
require_once 'routes/ProductRoutes.php';

Flight:: route('/', function(){
    echo 'Hello world!';
});
Flight::start();
?>