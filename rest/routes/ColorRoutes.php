<?php

/**
 * @OA\Get(path="/colors", tags={"colors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all colors from the API. ",
 *         @OA\Response( response=200, description="List of colors.")
 * )
 */

Flight::route("GET /colors", function(){
    Flight::json(Flight::color_service()->get_all());
});

/**
 * @OA\Get(path="/color_by_id", tags={"colors"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="query", name="id", example=1, description="Color ID"),
 *         @OA\Response( response=200, description="List of colors by id.")
 * )
 */

Flight::route("GET /color_by_id", function(){
    Flight::json(Flight::color_service()->get_by_id(Flight::request()->query['id']));
});

/**
 * @OA\Get(path="/colors/{id}", tags={"colors"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="path", name="id", example=1, description="Color ID"),
 *         @OA\Response( response=200, description="List of colors by id.")
 * )
 */

Flight::route("GET /colors/@id", function($id){
    Flight::json(Flight::color_service()->get_by_id($id));
});

 /**
 * @OA\Delete(
 *     path="/colors/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete color",
 *     tags={"colors"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Color ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Color deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */


Flight::route("DELETE /colors/@id", function($id){
    Flight::color_service()->delete($id);
    Flight::json(['message' => "color deleted successfully"]);
});

/**
* @OA\Post(
*     path="/color", security={{"ApiKeyAuth": {}}},
*     description="Add color",
*     tags={"colors"},
*     @OA\RequestBody(description="Add new student", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="colorName", type="string", example="Red",	description="Color name"),
*    				@OA\Property(property="colorAvailability", type="enum", example="Yes",	description="Color availability" ),
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

Flight::route("POST /color", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "color added successfully",
        'data' => Flight::color_service()->add($request)
    ]);
});


/**
 * @OA\Put(
 *     path="/color/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit color",
 *     tags={"colors"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Color ID"),
 *     @OA\RequestBody(description="Color info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="colorName", type="string", example="Red",	description="Color name"),
 *    				@OA\Property(property="colorAvailability", type="enum", example="Yes",	description="Color availability" ),           
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