<?php


require_once"BaseDao.class.php";

class ProductDao extends BaseDao
{

    public function __construct()
    {
        parent::__construct("products"); //object calls constructor of BaseDao class
  
    }

    public function get_all(){
        return parent::get_all();
    }


}
?>