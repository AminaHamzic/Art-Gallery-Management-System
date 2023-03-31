<?php

require "../vendor/autoload.php";
require "dao/UsersDao.class.php";

Flight:: register('user_dao', "UserDao");

require_once 'routes/UserRoutes.php';
require_once 'routes/ProductRoutes.php';



Flight:: start();

?>
