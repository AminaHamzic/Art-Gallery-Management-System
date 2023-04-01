<?php


/**
 * Import files from services and register them, because route calls service
 */

require "../vendor/autoload.php";
require "services/UserService.class.php";
require "services/ProductService.class.php";


Flight:: register('user_service', "UserService");
Flight:: register('product_service', "ProductService");


require_once 'routes/UserRoutes.php';
require_once 'routes/ProductRoutes.php';



Flight:: start();


?>
 