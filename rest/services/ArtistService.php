<?php
//route calls the service and service calls dao
require_once "BaseService.php";
require_once __DIR__.'/../dao/ArtistDao.class.php';


class ArtistService extends BaseService{
    public function __construct(){
        parent::__construct(new ArtistDao);
    }
}

?>