<?php

/**
 * @OA\Get(path="/orders", tags={"orders"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all orders from the API. ",
 *         @OA\Response( response=200, description="List of orders.")
 * )
 */


Flight::route("GET /orders", function(){
    Flight::json(Flight::order_service()->get_all());
});

/**
 * @OA\Get(path="/order_by_id", tags={"orders"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="query", name="id", example=1, description="Order ID"),
 *         @OA\Response( response=200, description="List of orders by id.")
 * )
 */

Flight::route("GET /order_by_id", function(){
    Flight::json(Flight::order_service()->get_by_id(Flight::request()->query['id']));
});

/**
 * @OA\Get(path="/orders/{id}", tags={"orders"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="path", name="id", example=1, description="Orders ID"),
 *         @OA\Response( response=200, description="List of orders by id.")
 * )
 */

Flight::route("GET /orders/@id", function($id){
    Flight::json(Flight::order_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/orders/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete order",
 *     tags={"orders"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Order ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Order deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */

Flight::route("DELETE /orders/@id", function($id){
    Flight::order_service()->delete($id);
    Flight::json(['message' => "order deleted successfully"]);
});

/**
* @OA\Post(
*     path="/order", security={{"ApiKeyAuth": {}}},
*     description="Add order",
*     tags={"orders"},
*     @OA\RequestBody(description="Add new order", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="first_name", type="string", example="Adnan",description="Name of the buyer"),
*    				@OA\Property(property="last_name", type="string", example="Brkic",	description="Lastname of the buyer" ),
*                   @OA\Property(property="email", type="string", example="adnan@gmail.com",	description="Email of the buyer" ),
*                   
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Order has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/

Flight::route("POST /order", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "order added successfully",
        'data' => Flight::order_service()->add($request)
    ]);
});
?>