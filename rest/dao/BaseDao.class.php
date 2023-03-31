<?php

class BaseDao{
    private $connection;

    private $tabel_name;

    /**
     * Class constructor used to establish connection to db
     */

    public function __construct($tabel_name){
        $this->tabel_name=$tabel_name;
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
        }}
    


/*
 method to get all entities from db
 */
public function get_all(){
    $stmt=$this->connection->prepare("SELECT * FROM " . $this->$tabel_name);
    $stmt->execute();
    return $stmt-> fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Method to get entity by id
 */
public function get_by_id($id){
    $stmt=$this->connection->prepare("SELECT * FROM " . $this->$tabel_name . " WHERE id=:id");
    $stmt->execute(['id'=> $id]);
    return $stmt-> fetch(PDO::FETCH_ASSOC); //if we put fetchAll it will return ascc array
}

/*
 method used to delete enitiy from db
 */
public function delete($id){
    $stmt=$this->connection->prepare("DELETE FROM " . $this->$tabel_name . " WHERE id= :id");
    $stmt->bindParam(':id', $id); //prevent SQL injection
    $stmt->execute();
}


/*
 method used to add eintities to db
 */
public function add($entity){
    $query="INSER INTO " . $this->$tabel_name . " (";
    foreach($entity as $column => $value){
        $query.= $column . ", ";
    }
    $query=substr($query, 0, -2);//deleting comma and space at the end
    $query.=") VALUES (";
    foreach($entity as $column => $value){
        $query.= ":" . $column . ", ";
    }
    $query=substr($query, 0, -2); 
    $query.=")";

    $stmt=$this->connection->prepare($query);
    $stmt->execute($entity);
    $entity['id']=$this->connection->lastInsertId(); //id of last inserted record
    return $entity;

}

/*
 method used to update entities to db
 */
public function update($entity, $id, $id_column="id"){
    $query="UPDATE " . $this->$tabel_name . "SET ";
    foreach($entity as $column => $value){
        $query.= $column . "=:" . $column . ", ";
    }
    $query=substr($query, 0, -2); 
    $query.=" WHERE ${id_column} = :id";
    $entity['id']=$id;
    $stmt=$this->connection->prepare($query);
    //$stmt=$this->connection->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name WHERE id=:id");
    $stmt-> execute($entity);
    return $entity;
}


}

?>