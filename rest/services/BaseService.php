<?php


class BaseService{
    private $dao;
    public function __construct($dao){
        $this->dao=$dao;
        }

        public function get_all(){
            return $this->$dao->get_all();
        }
    
        public function get_by_id($id){
            return $this->$dao->get_by_id($id);
        }
    
        public function add($entitiy){
            return $this->$dao->add($entitiy);
        }
    
        public function update($entitiy, $id){
            return $this->$dao->update($entitiy, $id);
        }
    
        public function delete($id){
            return $this->$dao->delete($id);
        }




}


?>