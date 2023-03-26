<?php
/* */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');
require 'vendor/autoload.php';
require "rest/dao/GalleryDao.class.php";
$newConn = new GalleryDao();

?>