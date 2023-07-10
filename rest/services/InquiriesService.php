<?php
//route calls the service and service calls dao
require_once "BaseService.php";
require_once __DIR__.'/../dao/InquiriesDao.class.php';


class InquiriesService extends BaseService{
    public function __construct(){
        parent::__construct(new InquiriesDao);
    }
}

?>