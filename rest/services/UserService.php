<?php
//route calls the service and service calls dao
class UserService{
    private $user_dao;

    public function __construct(){
        $this->$user_dao=new UserDao();


    }

    public function get_all(){
        return $this->$user_dao->get_all();
    }

    public function get_by_id($id){
        return $this->$user_dao->get_by_id($id);
    }

    public function add($entitiy){
        return $this->$user_dao->add($entitiy);
    }

    public function update($user, $id){
        return $this->$user_dao->update($user, $id);
    }

    public function delete($id){
        return $this->$user_dao->delete($id);
    }
}

?>