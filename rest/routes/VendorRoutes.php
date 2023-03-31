<?php
Flight::route("GET /vendors", function(){
    Flight::json(Flight::vendor_service()->get_all());
});

Flight::route("GET /vendor_by_id", function(){
    Flight::json(Flight::vendor_service()->get_by_id(Flight::request()->query['id']));
});

Flight::route("GET /vendors/@id", function($id){
    Flight::json(Flight::vendor_service()->get_by_id($id));
});

Flight::route("DELETE /vendors/@id", function($id){
    Flight::vendor_service()->delete($id);
    Flight::json(['message' => "vendor deleted successfully"]);
});

Flight::route("POST /vendor", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "vendor added successfully",
        'data' => Flight::vendor_service()->add($request)
    ]);
});

Flight::route("PUT /vendor/@id", function($id){
    $vendor = Flight::request()->data->getData();
    Flight::json(['message' => "vendor edit successfully",
        'data' => Flight::vendor_service()->update($vendor, $id)
    ]);
});

Flight::route("GET /vendors/@name", function($name){
    echo "Hello from /vendors route with name= ".$name;
});

Flight::route("GET /vendors/@name/@status", function($name, $status){
    echo "Hello from /vendors route with name = " . $name . " and status = " . $status;
});

?>