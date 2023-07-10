<?php

Flight::route("GET /categories", function(){
    Flight::json(Flight::category_service()->get_all());
 });
 
 Flight::route("GET /category_by_id", function(){
    Flight::json(Flight::category_service()->get_by_id(Flight::request()->query['id']));
 });
 
 Flight::route("GET /categories/@id", function($id){
    Flight::json(Flight::category_service()->get_by_id($id));
 });
 
 Flight::route("DELETE /categories/@id", function($id){
    Flight::category_service()->delete($id);
    Flight::json(['message' => "user deleted successfully"]);
 });
 
 Flight::route("POST /categories", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "category added successfully",
                  'data' => Flight::category_service()->add($request)
                 ]);
 });
 
 Flight::route("PUT /categories/@id", function($id){
    $category = Flight::request()->data->getData();
    Flight::json(['message' => "category edit successfully",
                  'data' => Flight::category_service()->update($category, $id)
                 ]);
 });
 
 Flight::route("GET /categories/@name", function($name){
    echo "Hello from /categories route with name= ".$name;
 });
 
 Flight::route("GET /categories/@name/@status", function($name, $status){
    echo "Hello from /categories route with name = " . $name . " and status = " . $status;
 });

 Flight::route("PUT /users/@id", function($id){
   $user = Flight::request()->data->getData();
   Flight::json(['message' => "user edit successfully",
                 'data' => Flight::user_service()->update($user, $id)
                ]);
});


?>