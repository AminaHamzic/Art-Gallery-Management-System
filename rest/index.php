
<?php
/**
 * Import files from services and register them, because route calls service
 */

require "../vendor/autoload.php";
require "services/UserService.php";
require "services/ProductService.php";
require "services/ArtistService.php";
require "services/CategoriesService.php";
require "services/InquiriesService.php";

Flight::register('user_service', "UserService");
Flight::register('product_service', "ProductService");
Flight::register('artist_service', "ArtistService");
Flight::register('category_service', "CategoriesService");
Flight::register('inquiries_service', "InquiriesService");

require_once 'routes/UserRoutes.php';
require_once 'routes/ProductRoutes.php';
require_once 'routes/ArtistRoutes.php';
require_once 'routes/CategoriesRoutes.php';
require_once 'routes/InquiriesRoutes.php';

/* utility function for generating JWT token */
Flight::map('jwt', function($user){
    $jwt = \Firebase\JWT\JWT::encode(["exp" => (time() + Config::JWT_TOKEN_TIME), "id" => $user["id"], "aid" => $user["account_id"], "r" => $user["role"]], Config::JWT_SECRET);
    return ["token" => $jwt];
  });

  
Flight:: route('/', function(){
    echo 'connection!';
});
Flight::start();
?>