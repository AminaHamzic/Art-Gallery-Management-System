<?php

require "../vendor/autoload.php";
require "dao/UserDao.class.php";
require "dao/ProductDao.class.php";

Flight:: register('user_dao', "UserDao");
Flight:: register('product_dao', "ProductDao");


require_once 'routes/UserRoutes.php';
require_once 'routes/ProductRoutes.php';



Flight:: start();
//28:20 video1

?>
