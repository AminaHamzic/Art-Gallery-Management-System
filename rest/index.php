<?php

require "../vendor/autoload.php";
require "dao/UsersDao.class.php";

Flight::route("/", function(){
    echo "Hello from / route";
});

Flight::route("GET /users", function(){
    //echo "Hello from /users route with name= ".$name;
    $users_dao=new UsersDao();
    $results=$users_dao->get_all();
    //print_r($results); It is returning assc array
    Flight:: json($results);
});

/**
 * getting user by id route
 */
Flight::route("GET /users/@id", function($id){
    $users_dao=new UsersDao();
    $results=$users_dao->get_by_id($id);
    //print_r($results); It is returning assc array
    Flight:: json($results);
});


/**
 * delete user by id route
 */
Flight::route("DELETE /users/@id", function($id){
    $users_dao=new UsersDao();
    $users_dao->delete($id);
    Flight:: json(['Message'=>"User deleted succesfully"]);
});


/**
 * adding user route
 */
Flight::route("POST /users", function(){
    $users_dao=new UsersDao();
    $request=Flight:: request()->data->getData(); //see what is request that we are sending
    //print_r($request);
    //$first_name=$request['fist_name'];
    //$last_name=$request['last_name'];
    $response= $users_dao->add($request);
    Flight:: json(['Message'=>'User added succesfully!', 'data'=>$response]);
});

/**
 * updating user route
 */
Flight::route("PUT /users/@id", function($id){
    $users_dao=new UsersDao();
    $request=Flight:: request()->data->getData(); //see what is request that we are sending
    //print_r($request);
    //$first_name=$request['fist_name'];
    //$last_name=$request['last_name'];
    $response= $users_dao->update($request, $id);
    Flight:: json(['Message'=>'User updated succesfully!', 'data'=>$response]);
});



Flight:: start();

?>
