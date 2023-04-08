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

Flight::route("DELETE /category/@id", function($id){
    Flight::category_service()->delete($id);
    Flight::json(['message' => "category deleted successfully"]);
});

Flight::route("POST /category", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "category added successfully",
        'data' => Flight::category_service()->add($request)
    ]);
});

Flight::route("PUT /category/@id", function($id){
    $category = Flight::request()->data->getData();
    Flight::json(['message' => "category edit successfully",
        'data' => Flight::category_service()->update($category, $id)
    ]);
});

Flight::route("GET /category/@name", function($name){
    echo "Hello from /category route with name= ".$name;
});

Flight::route("GET /category/@name/@status", function($name, $status){
    echo "Hello from /category route with name = " . $name . " and status = " . $status;
});

?>