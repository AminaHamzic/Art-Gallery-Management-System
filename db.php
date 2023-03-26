<?php

require_once("rest/dao/UsersDao.class.php");
$users_dao=new UsersDao(); //created object that will call constructor where connection is established
$results=$users_dao->get_all();
print_r($results);








/*
$servername = "localhost";
$username = "root";
$password = "";
$schema = "art-gallery";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password); // created new object of PDO class
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  $stmt = $conn->prepare("SELECT * FROM users"); //providing query
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //if we skip parameter, index value of the array will be given
  print_r($result);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/

?>