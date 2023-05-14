<?php
Flight::route("GET /sizes", function(){
    Flight::json(Flight::size_service()->get_all());
});

Flight::route("GET /size_by_id", function(){
    Flight::json(Flight::size_service()->get_by_id(Flight::request()->query['id']));
});

Flight::route("GET /sizes/@id", function($id){
    Flight::json(Flight::size_service()->get_by_id($id));
});

Flight::route("DELETE /sizes/@id", function($id){
    Flight::size_service()->delete($id);
    Flight::json(['message' => "size deleted successfully"]);
});

Flight::route("POST /size", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "size added successfully",
        'data' => Flight::size_service()->add($request)
    ]);
});

Flight::route("PUT /size/@id", function($id){
    $size = Flight::request()->data->getData();
    Flight::json(['message' => "size edit successfully",
        'data' => Flight::size_service()->update($size, $id)
    ]);
});

Flight::route("GET /sizes/@name", function($name){
    echo "Hello from /sizes route with name= ".$name;
});

Flight::route("GET /sizes/@name/@status", function($name, $status){
    echo "Hello from /sizes route with name = " . $name . " and status = " . $status;
});

?>