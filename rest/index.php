<?php

require "../vendor/autoload.php";
require "dao/UsersDao.class.php";

//register UserDao class
Flight:: register('user_dao', "UsersDao");

Flight::route("/", function(){
    echo "Hello from / route";
});

Flight::route("GET /users", function(){
    //echo "Hello from /users route with name= ".$name;
    //$users_dao=new UsersDao();
    //$results=Flight:: user_dao()->get_all();
    //print_r($results); It is returning assc array
    Flight:: json(Flight:: user_dao()->get_all());
});

/**
 * getting user by id route
 */
Flight::route("GET /users/@id", function($id){
    //$users_dao=new UsersDao();
    //$results=Flight:: user_dao()->get_by_id($id);
    //print_r($results); It is returning assc array
    Flight:: json(Flight:: user_dao()->get_by_id($id));
});


/**
 * delete user by id route
 */
Flight::route("DELETE /users/@id", function($id){
    //$users_dao=new UsersDao();
    Flight:: user_dao()->delete($id);
    Flight:: json(['Message'=>"User deleted succesfully"]);
});


/**
 * adding user route
 */
Flight::route("POST /users", function(){
    //$users_dao=new UsersDao();
    //print_r($request);
    //$first_name=$request['fist_name'];
    //$last_name=$request['last_name'];
    //$response= Flight:: user_dao()->add($request);
    $request=Flight:: request()->data->getData(); //see what is request that we are sending
    Flight:: json(['Message'=>'User added succesfully!', 'data'=>Flight:: user_dao()->add($request)]);
});

/**
 * updating user route
 */
Flight::route("PUT /users/@id", function($id){
    //$users_dao=new UsersDao();
    $user=Flight:: request()->data->getData(); //see what is request that we are sending
    //print_r($request);
    //$first_name=$request['fist_name'];
    //$last_name=$request['last_name'];
    $response= Flight:: user_dao()->update($user, $id);
    Flight:: json(['Message'=>'User updated succesfully!', 'data'=>Flight:: user_dao()->update($user, $id)]);
});



Flight:: start();

?>
