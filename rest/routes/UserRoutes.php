<?php

Flight::route("GET /users", function(){
    Flight:: json(Flight:: user_service()->get_all());
});

Flight::route("GET /users/@id", function($id){
    Flight:: json(Flight:: user_service()->get_by_id($id));
});

Flight::route("DELETE /users/@id", function($id){
    Flight:: user_service()->delete($id);
    Flight:: json(['Message'=>"User deleted succesfully"]);
});

Flight::route("POST /users", function(){
    $request=Flight:: request()->data->getData(); //see what is request that we are sending
    Flight:: json(['Message'=>'User added succesfully!', 'data'=>Flight:: user_service()->add($request)]);
});

Flight::route("PUT /users/@id", function($id){
    $user=Flight:: request()->data->getData();
    $response= Flight:: user_service()->update($user, $id);
    Flight:: json(['Message'=>'User updated succesfully!', 'data'=>Flight:: user_service()->update($user, $id)]);
});

Flight:: start();

?>