<?php

/**
 * @OA\Get(path="/products", tags={"products"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all products from the API. ",
 *         @OA\Response( response=200, description="List of orders.")
 * )
 */

Flight::route("GET /products", function(){
    Flight::json(Flight::product_service()->get_all());
});

/**
 * @OA\Get(path="/latest", tags={"products"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return latest products from the API. ",
 *         @OA\Response( response=200, description="List of featured products.")
 * )
 */

Flight::route("GET /latest", function(){
    Flight::json(Flight::product_service()->get_latest());
});

/**
 * @OA\Get(path="/featured", tags={"products"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return featured products from the API. ",
 *         @OA\Response( response=200, description="List of featured products.")
 * )
 */


Flight::route("GET /featured", function(){
    Flight::json(Flight::product_service()->featured_products());
});

/**
 * @OA\Get(path="/special", tags={"products"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return special products from the API. ",
 *         @OA\Response( response=200, description="List of special products.")
 * )
 */

Flight::route("GET /special", function(){
    Flight::json(Flight::product_service()->special_product());
});

/**
 * @OA\Get(path="/product_by_id", tags={"products"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="query", name="id", example=1, description="Product ID"),
 *         @OA\Response( response=200, description="List of products by id.")
 * )
 */

Flight::route("GET /product_by_id", function(){
    Flight::json(Flight::product_service()->get_by_id(Flight::request()->query['id']));
});

/**
 * @OA\Get(path="/products/{id}", tags={"products"}, security={{"ApiKeyAuth": {}}},
 *         @OA\Parameter(in="path", name="id", example=1, description="Products ID"),
 *         @OA\Response( response=200, description="List of products by id.")
 * )
 */

Flight::route("GET /products/@id", function($id){
    Flight::json(Flight::product_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/products/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete product",
 *     tags={"products"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Product ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Product deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */


Flight::route("DELETE /products/@id", function($id){
    Flight::product_service()->delete($id);
    Flight::json(['message' => "product deleted successfully"]);
});

/**
* @OA\Post(
*     path="/product", security={{"ApiKeyAuth": {}}},
*     description="Add product",
*     tags={"products"},
*     @OA\RequestBody(description="Add new product", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="productName", type="string", example="Running shoes",description="Product name."),
*    				@OA\Property(property="productAvailability", type="enum", example="Yes",description="Product availability" ),
*                   @OA\Property(property="productInStock", type="number", example="10",description="Product in stock" ),
*                   @OA\Property(property="productDiscount", type="number", example="10",description="Product discount" )
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Product has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/

Flight::route("POST /product", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "product added successfully",
        'data' => Flight::product_service()->add($request)
    ]);
});

/**
 * @OA\Put(
 *     path="/product/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit product",
 *     tags={"products"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Product ID"),
 *     @OA\RequestBody(description="Product info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="productName", type="string", example="Red",	description="Color name"),
 *    				@OA\Property(property="productAvailability", type="enum", example="Yes",  description="Product availability" ),
 *                  @OA\Property(property="productInStock", type="number", example="10",description="Product in stock" ),
 *                  @OA\Property(property="productDiscount", type="number", example="10",description="Product discount" )           
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

Flight::route("PUT /product/@id", function($id){
    $product = Flight::request()->data->getData();
    Flight::json(['message' => "product edit successfully",
        'data' => Flight::product_service()->update($product, $id)
    ]);
});

Flight::route("GET /products/@name", function($name){
    echo "Hello from /products route with name= ".$name;
});

Flight::route("GET /products/@name/@status", function($name, $status){
    echo "Hello from /products route with name = " . $name . " and status = " . $status;
});

?>