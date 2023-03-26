<?php

class UsersDao
{
    private $connection; 

    /**
     * Class constructor used to establish connection to db
    */

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=art-gallery", $username, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


/*
 method to get all users from db
 */
public function get_all(){
    $stmt=$this->connection->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt-> fetchAll(PDO::FETCH_ASSOC);


}

/*
 method to add users to db
 */
public function add($first_name, $last_name){
    $stmt=$this->connection->prepare("INSERT INTO users(first_name, last_name) VALUES ('$first_name', '$last_name')");
    $stmt->execute();
    return $stmt-> fetchAll(PDO::FETCH_ASSOC);


}

}
?>