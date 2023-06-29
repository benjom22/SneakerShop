<?php

/**
 * @OA\Get(path="/categories", tags={"categories"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all categories from the API. ",
 *         @OA\Response( response=200, description="List of categories.")
 * )
 */

Flight::route("GET /categories", function(){
    Flight::json(Flight::category_service()->get_all());
});

/**
 * @OA\Get(path="/categories_filter", tags={"categories"}, security={{"ApiKeyAuth": {}}},
 *         summary="Return all categories filter from the API. ",
 *         @OA\Response( response=200, description="List of categories filter.")
 * )
 */

Flight::route('GET /categories_filter', function(){
    // Your SQL query to retrieve users from the database
    $sql = "SELECT categoryID, categoryName FROM category";
    
    // Execute the query and fetch the results
    $category = Flight::db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the results as a JSON-encoded array
    Flight::json($category);
});

/**
 * @OA\Get(path="/category_by_id", tags={"categories"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(in="query", name="id", example=1, description="Category ID"),
 *         @OA\Response( response=200, description="List of categories by id provided.")
 * )
 */

Flight::route("GET /category_by_id", function(){
    Flight::json(Flight::category_service()->get_by_id(Flight::request()->query['id']));
});

//Id provided in the path

/**
 * @OA\Get(path="/categories/{id}", tags={"categories"}, security={{"ApiKeyAuth": {}}},
 *     @OA\Parameter(in="path", name="id", example=1, description="Category ID"),
 *         @OA\Response( response=200, description="List of categories by id provided in the path.")
 * )
 */

Flight::route("GET /categories/@id", function($id){
    Flight::json(Flight::category_service()->get_by_id($id));
});

/**
 * @OA\Delete(
 *     path="/category/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Delete category",
 *     tags={"categories"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Category ID"),
 *     @OA\Response(
 *         response=200,
 *         description="Note deleted"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */

Flight::route("DELETE /category/@id", function($id){
    Flight::category_service()->delete($id);
    Flight::json(['message' => "category deleted successfully"]);
});

/**
* @OA\Post(
*     path="/category", security={{"ApiKeyAuth": {}}},
*     description="Add category",
*     tags={"categories"},
*     @OA\RequestBody(description="Add new category", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="categoryName", type="string", example="Demo",	description="Category name"),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Category has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/

Flight::route("POST /category", function(){
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "category added successfully",
        'data' => Flight::category_service()->add($request)
    ]);
});

/**
 * @OA\Put(
 *     path="/category/{id}", security={{"ApiKeyAuth": {}}},
 *     description="Edit category",
 *     tags={"categories"},
 *     @OA\Parameter(in="path", name="id", example=1, description="Category ID"),
 *     @OA\RequestBody(description="Student info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="categoryName", type="string", example="Demo",	description="Category name"),
 *        )
 *     )),
 *     @OA\Response(
 *         response=200,
 *         description="Category has been edited"
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error"
 *     )
 * )
 */

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