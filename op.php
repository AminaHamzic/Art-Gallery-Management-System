<?php

require_once("rest/dao/UsersDao.class.php");
$users_dao=new UsersDao();


$type=$_REQUEST['type'];

switch($type){
    case 'add':
        $first_name=$_REQUEST['first_name'];
        $last_name=$_REQUEST['last_name'];
        $results=$users_dao->add($first_name, $last_name);
        print_r($results);
        break;
    case 'delete':
        print_r('delete later');
        break;
    case 'get':
    default;
        $results=$users_dao->get_all();
        print_r($results);
        break;
    case 'update':
        print_r('update_later');
        break;


}








?>