<?php

Flight::route("GET /colors", function(){
    Flight::json(Flight::color_service()->get_all());
});

Flight::route("GET /color_by_id", function(){
    Flight::json(Flight::color_service()->get_by_id(Flight::request()->query['id']));
});

Flight::route("GET /colors/@id", function($id){
    Flight::json(Flight::color_service()->get_by_id($id));
});

Flight::route("DELETE /colors/@id", function($id){
    Flight::color_service()->delete($id);
    Flight::json(['message' => "color deleted successfully"]);
});

Flight::route("POST /color", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "color added successfully",
        'data' => Flight::color_service()->add($request)
    ]);
});

Flight::route("PUT /color/@id", function($id){
    $color = Flight::request()->data->getData();
    Flight::json(['message' => "color edit successfully",
        'data' => Flight::color_service()->update($color, $id)
    ]);
});

Flight::route("GET /colors/@name", function($name){
    echo "Hello from /colors route with name= ".$name;
});

Flight::route("GET /colors/@name/@status", function($name, $status){
    echo "Hello from /colors route with name = " . $name . " and status = " . $status;
});

?>