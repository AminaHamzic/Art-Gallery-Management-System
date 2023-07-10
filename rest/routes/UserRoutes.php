<?php

Flight::route("GET /users", function(){
    Flight::json(Flight::user_service()->get_all());
 });
 
 Flight::route("GET /user_by_id", function(){
    Flight::json(Flight::user_service()->get_by_id(Flight::request()->query['id']));
 });
 
 Flight::route("GET /users/@id", function($id){
    Flight::json(Flight::user_service()->get_by_id($id));
 });
 
 Flight::route("DELETE /users/@id", function($id){
    Flight::user_service()->delete($id);
    Flight::json(['message' => "user deleted successfully"]);
 });
 
 Flight::route("POST /users", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "user added successfully",
                  'data' => Flight::user_service()->add($request)
                 ]);
 });
 
 Flight::route("PUT /users/@id", function($id){
    $user = Flight::request()->data->getData();
    Flight::json(['message' => "user edit successfully",
                  'data' => Flight::user_service()->update($user, $id)
                 ]);
 });
 
 Flight::route("GET /users/@name", function($name){
    echo "Hello from /users route with name= ".$name;
 });
 
 Flight::route("GET /users/@name/@status", function($name, $status){
    echo "Hello from /users route with name = " . $name . " and status = " . $status;
 });


 Flight::route('POST /register', function(){
   $data = Flight::request()->data->getData();
   Flight::user_service()->register($data);
   Flight::json(["message" => "User registered successfully"]);
  
 });

 Flight::route('POST /user/login', function(){
   $data = Flight::request()->data->getData();
   Flight::user_service()->login($data);
   Flight::json(["message" => "You are logged in"]);
 });
 

 Flight::route('GET /confirm/@token', function($token){
   Flight::json(Flight::jwt(Flight::userService()->confirm($token)));
 });
 





 Flight::route('POST /forgot', function(){
   $data = Flight::request()->data->getData();
   Flight::userService()->forgot($data);
   Flight::json(["message" => "Recovery link has been sent to your email"]);
 });
 

Flight::route('POST /reset', function(){
   Flight::json(Flight::jwt(Flight::userService()->reset(Flight::request()->data->getData())));
 });

 
 


?>