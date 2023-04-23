<?php

Flight::route("GET /artists", function(){
    Flight::json(Flight::artist_service()->get_all());
 });
 
 Flight::route("GET /artist_by_id", function(){
    Flight::json(Flight::artist_service()->get_by_id(Flight::request()->query['id']));
 });
 
 Flight::route("GET /artists/@id", function($id){
    Flight::json(Flight::artist_service()->get_by_id($id));
 });
 
 Flight::route("DELETE /artists/@id", function($id){
    Flight::artist_service()->delete($id);
    Flight::json(['message' => "user deleted successfully"]);
 });
 
 Flight::route("POST /artists", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "Artist added successfully",
                  'data' => Flight::artist_service()->add($request)
                 ]);
 });
 
 Flight::route("PUT /artists/@id", function($id){
    $user = Flight::request()->data->getData();
    Flight::json(['message' => "Artist edit successfully",
                  'data' => Flight::artist_service()->update($user, $id)
                 ]);
 });
 
 Flight::route("GET /artists/@name", function($name){
    echo "Hello from /artists route with name= ".$name;
 });
 
 Flight::route("GET /artists/@name/@status", function($name, $status){
    echo "Hello from /artists route with name = " . $name . " and status = " . $status;
 });

?>