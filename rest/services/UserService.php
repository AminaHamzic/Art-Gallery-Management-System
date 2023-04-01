<?php
//route calls the service and service calls dao
require"BaseService.php";


class UserService extends BaseService{
    public function __construct(){
        parent::__construct(new UserDao);
    }

    public function add($entitiy){
        parent::add($entitiy);
        //send email
        /*if("validateField($entitiy['first_name'])){
            error
        }*/

    }


}

?>