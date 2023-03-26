<?php

require "../vendor/autoload.php";
Flight::route("/", function(){
    echo "Hello from / route";
});

Flight::route("GET /users/@name", function($name){
    echo "Hello from /users route with name= ".$name;
});

Flight:: start();

?>