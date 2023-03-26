<?php

require_once("rest/dao/UsersDao.class.php");
$users_dao=new UsersDao(); //created object that will call constructor where connection is established
$first_name=$_REQUEST['first_name'];
$last_name=$_REQUEST['last_name'];
$results=$users_dao->add($first_name, $last_name);
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
  print($_REQUEST);
  $first_name=$_REQUEST['first_name'];
  $last_name=$_REQUEST['last_name'];
  $stmt=$conn->prepare("INSERT INTO users(first_name, last_name) VALUES ('$first_name', '$last_name')"); //query for inserting
  $result=$stmt->execute();
  print_r($result); //result will be 1 if it is inserted succesfully


} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/

?>