<?php
Flight::route("GET /productphoto", function(){
    Flight::json(Flight::productphoto_service()->get_all());
});

Flight::route("GET /productphoto_by_id", function(){
    Flight::json(Flight::productphoto_service()->get_by_id(Flight::request()->query['id']));
});

Flight::route("GET /productphoto/@id", function($id){
    Flight::json(Flight::productphoto_service()->get_by_id($id));
});

Flight::route("DELETE /productphoto/@id", function($id){
    Flight::productphoto_service()->delete($id);
    Flight::json(['message' => "productphoto deleted successfully"]);
});

Flight::route("POST /productphoto", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "productphoto added successfully",
        'data' => Flight::productphoto_service()->add($request)
    ]);
});

Flight::route("PUT /productphoto/@id", function($id){
    $productphoto = Flight::request()->data->getData();
    Flight::json(['message' => "productphoto edit successfully",
        'data' => Flight::productphoto_service()->update($productphoto, $id)
    ]);
});

Flight::route("GET /productphoto/@name", function($name){
    echo "Hello from /productphoto route with name= ".$name;
});

Flight::route("GET /productphoto/@name/@status", function($name, $status){
    echo "Hello from /productphotos route with name = " . $name . " and status = " . $status;
});

?>