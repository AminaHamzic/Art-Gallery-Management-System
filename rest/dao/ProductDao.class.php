<?php

require_once "BaseDao.class.php";

class ProductDao extends BaseDao
{

    public function __construct()
    {
        parent::__construct("products"); //object calls constructor of BaseDao class
  
    }

    public function getProductsFromCategory($category_id){
        $stmt = $this->conn->prepare("SELECT * FROM products
        WHERE category_id = :category_id");
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  

}
?>