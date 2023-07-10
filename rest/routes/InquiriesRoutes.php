<?php

Flight::route("GET /inquiries", function(){
    Flight::json(Flight::inquiries_service()->get_all());
 });
 
 Flight::route("GET /inquiries_by_id", function(){
    Flight::json(Flight::inquiries_service()->get_by_id(Flight::request()->query['id']));
 });
 
 Flight::route("GET /inquiries/@id/", function($id){
    Flight::json(Flight::inquiries_service()->get_by_id($id));
 });
 
 Flight::route("DELETE /inquiries/@id", function($id){
    Flight::inquiries_service()->delete($id);
    Flight::json(['message' => "user deleted successfully"]);
 });
 
 Flight::route("POST /inquiries", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "inquiries added successfully",
                  'data' => Flight::inquiries_service()->add($request)
                 ]);
 });
 
 Flight::route("PUT /inquiries/@id", function($id){
    $user = Flight::request()->data->getData();
    Flight::json(['message' => "inquiries edit successfully",
                  'data' => Flight::inquiries_service()->update($user, $id)
                 ]);
 });
 
 Flight::route("GET /inquiries/@name", function($name){
    echo "Hello from /inquiries route with name= ".$name;
 });
 
 Flight::route("GET /inquiries/@name/@status", function($name, $status){
    echo "Hello from /inquiries route with name = " . $name . " and status = " . $status;
 });

?>