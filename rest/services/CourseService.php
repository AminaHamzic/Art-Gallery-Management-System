<?php
//route calls the service and service calls dao
class UserService{
    private $product_dao;

    public function __construct(){
        $this->$product_dao=new ProductDao();
    }

    public function get_all(){
        return $this->$product_dao->get_all();
    }

    public function get_by_id($id){
        return $this->$product_dao->get_by_id($id);
    }

    public function add($entitiy){
        return $this->$product_dao->add($entitiy);
    }

    public function update($user, $id){
        return $this->$product_dao->update($user, $id);
    }

    public function delete($id){
        return $this->$product_dao->delete($id);
    }
}

?>