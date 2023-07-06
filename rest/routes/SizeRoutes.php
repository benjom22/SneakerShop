<?php

/**
 * @OA\Get(path="/sizes", tags={"sizes"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all sizes from the API. ",
 *         @OA\Response( response=200, description="List of sizes.")
 * )
 */

Flight::route("GET /sizes", function(){
    Flight::json(Flight::size_service()->get_all());
});

/**
 * @OA\Get(path="/size_by_id", tags={"sizes"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="query", name="id", example=1, description="Size ID"),
 *         @OA\Response( response=200, description="List of sizes by id.")
 * )
 */


Flight::route("GET /size_by_id", function(){
    Flight::json(Flight::size_service()->get_by_id(Flight::request()->query['id']));
});

/**
 * @OA\Get(path="/sizes/{id}", tags={"sizes"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="path", name="id", example=1, description="Size ID"),
 *         @OA\Response( response=200, description="List of sizes by id.")
 * )
 */

Flight::route("GET /sizes/@id", function($id){
    Flight::json(Flight::size_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/sizes/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete size",
 *     tags={"sizes"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Size ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Size deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */


Flight::route("DELETE /sizes/@id", function($id){
    Flight::size_service()->delete($id);
    Flight::json(['message' => "size deleted successfully"]);
});

/**
* @OA\Post(
*     path="/size", security={{"ApiKeyAuth": {}}},
*     description="Add size",
*     tags={"sizes"},
*     @OA\RequestBody(description="Add new size", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="size", type="number", example="40",	description="size name"),
*    				@OA\Property(property="description", type="string", example="Size 40",	description="Size number" ),
*                   
*                   
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Color has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/

Flight::route("POST /size", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "size added successfully",
        'data' => Flight::size_service()->add($request)
    ]);
});


/**
 * @OA\Put(
 *     path="/size/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit size",
 *     tags={"sizes"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Sizes ID"),
 *     @OA\RequestBody(description="Color info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="size", type="number", example="40",	description="size name"),
 *    				@OA\Property(property="description", type="string", example="Size 40",	description="Size number" ),           
 *        )
 *     )),
 *     @OA\Response(
 *         response=200,
 *         description="Color has been edited"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */

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