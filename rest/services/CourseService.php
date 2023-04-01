<?php
//route calls the service and service calls dao
require"BaseService.php";


class ProductService extends BaseService{
    public function __construct(){
        parent::__construct(new ProductDao);
    }
}

?>