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
            //echo "Connected successfully";
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
public function add($user){
    $stmt=$this->connection->prepare("INSERT INTO users(first_name, last_name) VALUES (:first_name, :last_name)");
    $stmt->execute($user);
    $user['id']=$this->connection->lastInsertId(); //id of last inserted record
    return $user;


}

/*
 method to update users to db
 */
public function update($user, $id){
    $user['id']=$id;
    $stmt=$this->connection->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name WHERE id=:id");
    $stmt-> execute($user);
    return $user;



}

/*
 method to delete users
 */
public function delete($id){
    $stmt=$this->connection->prepare("DELETE FROM users WHERE id= :id");
    $stmt->bindParam(':id', $id); //prevent SQL injection
    $stmt->execute();
}

/**
 * get user by id
 */
public function get_by_id($id){
    $stmt=$this->connection->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=> $id]);
    return $stmt-> fetch(PDO::FETCH_ASSOC); //if we put fetchAll it will return ascc array


}






}
?>