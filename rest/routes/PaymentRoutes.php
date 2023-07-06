<?php

/**
 * @OA\Get(path="/payments", tags={"payments"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all payments from the API. ",
 *         @OA\Response( response=200, description="List of payments.")
 * )
 */

Flight::route("GET /payments", function(){
    Flight::json(Flight::payment_service()->get_all());
});

/**
 * @OA\Get(path="/payment_by_id", tags={"payments"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="query", name="id", example=1, description="Payment ID"),
 *         @OA\Response( response=200, description="List of payments by id.")
 * )
 */

Flight::route("GET /payment_by_id", function(){
    Flight::json(Flight::payment_service()->get_by_id(Flight::request()->query['id']));
});

/**
 * @OA\Get(path="/payments/{id}", tags={"payments"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="path", name="id", example=1, description="Payment ID"),
 *         @OA\Response( response=200, description="List of payments by id.")
 * )
 */

Flight::route("GET /payments/@id", function($id){
    Flight::json(Flight::payment_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/payments/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete payment",
 *     tags={"payments"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Payment ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Payment deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */

Flight::route("DELETE /payments/@id", function($id){
    Flight::payment_service()->delete($id);
    Flight::json(['message' => "payment deleted successfully"]);
});

/**
* @OA\Post(
*     path="/payment", security={{"ApiKeyAuth": {}}},
*     description="Add payment",
*     tags={"payments"},
*     @OA\RequestBody(description="Add new payment", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="paymentType", type="string", example="In cash",description="Payment ID"),
*    				@OA\Property(property="paymentAmount", type="number", example="100",	description="Payment completed" ),
*                   
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

Flight::route("POST /payment", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "payment added successfully",
        'data' => Flight::payment_service()->add($request)
    ]);
});

/*Flight::route("PUT /payment/@id", function($id){
    $payment = Flight::request()->data->getData();
    Flight::json(['message' => "payment edit successfully",
        'data' => Flight::payment_service()->update($payment, $id)
    ]);
});*/

?>