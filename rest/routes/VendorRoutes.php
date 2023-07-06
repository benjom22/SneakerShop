<?php

/**
 * @OA\Get(path="/vendors", tags={"vendors"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all vendors from the API. ",
 *         @OA\Response( response=200, description="List of vendors.")
 * )
 */

Flight::route("GET /vendors", function(){
    Flight::json(Flight::vendor_service()->get_all());
});

/**
 * @OA\Get(path="/vendor_by_id", tags={"vendors"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="query", name="id", example=1, description="Vendor ID"),
 *         @OA\Response( response=200, description="List of vendros by id.")
 * )
 */

Flight::route("GET /vendor_by_id", function(){
    Flight::json(Flight::vendor_service()->get_by_id(Flight::request()->query['id']));
});

/**
 * @OA\Get(path="/vendors/{id}", tags={"vendors"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="path", name="id", example=1, description="Vendor ID"),
 *         @OA\Response( response=200, description="List of vendors by id.")
 * )
 */

Flight::route("GET /vendors/@id", function($id){
    Flight::json(Flight::vendor_service()->get_by_id($id));
});


/**
 * @OA\Delete(
 *     path="/vendors/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete vendor",
 *     tags={"vendors"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Vendor ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Vendor deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */


Flight::route("DELETE /vendors/@id", function($id){
    Flight::vendor_service()->delete($id);
    Flight::json(['message' => "vendor deleted successfully"]);
});

/**
* @OA\Post(
*     path="/vendor", security={{"ApiKeyAuth": {}}},
*     description="Add vendor",
*     tags={"vendors"},
*     @OA\RequestBody(description="Add new vendor", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="vendorCompanyName", type="string", example="Adidas", description="Vendor name"),
*    				@OA\Property(property="vendorAddress", type="string", example="Gradacacka",	description="Vendor address" ),
*                   @OA\Property(property="vendorCityName", type="string", example="Sarajevo",	description="Vendor city" ),
*                   @OA\Property(property="vendorPostalCode", type="number", example="71000",	description="Vendor postal code" ),
*                   @OA\Property(property="vendorPhone", type="number", example="+38762111222",	description="Vendor phone number" ),
*                   @OA\Property(property="vendorWebSite", type="string", example="www.adidas.com",	description="Vendor website" ),
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

Flight::route("POST /vendor", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "vendor added successfully",
        'data' => Flight::vendor_service()->add($request)
    ]);
});

/**
 * @OA\Put(
 *     path="/vendor/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit vendor",
 *     tags={"colors"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Vendor ID"),
 *     @OA\RequestBody(description="Color info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="vendorCompanyName", type="string", example="Adidas", description="Vendor name"),
*    				@OA\Property(property="vendorAddress", type="string", example="Gradacacka",	description="Vendor address" ),
*                   @OA\Property(property="vendorCityName", type="string", example="Sarajevo",	description="Vendor city" ),
*                   @OA\Property(property="vendorPostalCode", type="number", example="71000",	description="Vendor postal code" ),
*                   @OA\Property(property="vendorPhone", type="number", example="+38762111222",	description="Vendor phone number" ),
*                   @OA\Property(property="vendorWebSite", type="string", example="www.adidas.com",	description="Vendor website" ),      
 *        )
 *     )),
 *     @OA\Response(
 *         response=200,
 *         description="Vendor has been edited"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */

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