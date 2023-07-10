<?php
require_once 'BaseService.php';
require_once __DIR__."/../dao/UserDao.class.php";

class UserService extends BaseService{
    public function __construct(){
        parent::__construct(new UserDao);

    } 

    public function add($entity){
        return parent::add($entity);
    }

    public function update($id, $entity){
        
        return parent::update($id, $entity);
    }

    public function login($user){
        return $this->dao->login($user);
    }

    public function register($user){
        if(!isset($user['email'])) throw new Exception("Email is missing", 400);
        return $this->dao->add([
            "email" => $user['email'],
            "password" => $user['password'],
        ]);
        //token 
    }
}
?>