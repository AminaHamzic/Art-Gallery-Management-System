<?php
//route calls the service and service calls dao
require_once "BaseService.php";
require_once __DIR__.'/../dao/ProductDao.class.php';


class ProductService extends BaseService{
    public function __construct(){
        parent::__construct(new ProductDao);
    }

    

}

?>