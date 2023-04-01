<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/UserDao.class.php";

class UserService extends BaseService{
    public function __construct(){
        parent::__construct(new UserDao);
    } 

    public function add($entity){
        return parent::add($entity);
        /*
        example 
        send an email
        if(!validateField($entity['first_name'])){
            //error
        }
        */
    }
}
?>