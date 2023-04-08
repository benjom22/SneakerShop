<?php

Flight::route("GET /payments", function(){
    Flight::json(Flight::payment_service()->get_all());
});

Flight::route("GET /payment_by_id", function(){
    Flight::json(Flight::payment_service()->get_by_id(Flight::request()->query['id']));
});

Flight::route("GET /payments/@id", function($id){
    Flight::json(Flight::payment_service()->get_by_id($id));
});

Flight::route("DELETE /payments/@id", function($id){
    Flight::payment_service()->delete($id);
    Flight::json(['message' => "payment deleted successfully"]);
});

Flight::route("POST /payment", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "payment added successfully",
        'data' => Flight::payment_service()->add($request)
    ]);
});

Flight::route("PUT /payment/@id", function($id){
    $payment = Flight::request()->data->getData();
    Flight::json(['message' => "payment edit successfully",
        'data' => Flight::payment_service()->update($payment, $id)
    ]);
});

Flight::route("GET /payments/@name", function($name){
    echo "Hello from /payments route with name= ".$name;
});

Flight::route("GET /payments/@name/@status", function($name, $status){
    echo "Hello from /payments route with name = " . $name . " and status = " . $status;
});

?>