<?php

require_once"BaseDao.class.php";

class UserDao extends BaseDao
{

    public function __construct()
    {
        parent::__construct("users"); //object calls constructor of BaseDao class
  
    }

    public function get_all(){
        return parent::get_all();
    }


}
?>