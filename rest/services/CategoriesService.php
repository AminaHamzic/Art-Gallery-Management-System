<?php
//route calls the service and service calls dao
require_once "BaseService.php";
require_once __DIR__.'/../dao/CategoriesDao.class.php';


class CategoriesService extends BaseService{
    public function __construct(){
        parent::__construct(new CategoriesDao);
    }
}

?>