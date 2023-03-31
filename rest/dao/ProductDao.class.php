<?php

class ProductDao
{
    private $connection; 

    /**
     * Class constructor used to establish connection to db
    */

    public function __construct()
    {
        $servername = "localhost";
        $productname = "root";
        $password = "";

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=art-gallery", $productname, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


/*
 method to get all products from db
 */
public function get_all(){
    $stmt=$this->connection->prepare("SELECT * FROM products");
    $stmt->execute();
    return $stmt-> fetchAll(PDO::FETCH_ASSOC);


}

/*
 method to add products to db
 */
public function add($product){
    $stmt=$this->connection->prepare("INSERT INTO products(first_name, last_name) VALUES (:first_name, :last_name)");
    $stmt->execute($product);
    $product['id']=$this->connection->lastInsertId(); //id of last inserted record
    return $product;


}

/*
 method to update products to db
 */
public function update($product, $id){
    $product['id']=$id;
    $stmt=$this->connection->prepare("UPDATE products SET first_name=:first_name, last_name=:last_name WHERE id=:id");
    $stmt-> execute($product);
    return $product;
}

/*
 method to delete products
 */
public function delete($id){
    $stmt=$this->connection->prepare("DELETE FROM products WHERE id= :id");
    $stmt->bindParam(':id', $id); //prevent SQL injection
    $stmt->execute();
}

/**
 * get product by id
 */
public function get_by_id($id){
    $stmt=$this->connection->prepare("SELECT * FROM products WHERE id=:id");
    $stmt->execute(['id'=> $id]);
    return $stmt-> fetch(PDO::FETCH_ASSOC); //if we put fetchAll it will return ascc array
}

}
?>