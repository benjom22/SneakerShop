<?php
use OpenApi\Annotations as OA;
/**
 * @OA\Tag(
 *     name="category",
 *     description="Category related operations"
 * )
 * @OA\Info(
 *     version="1.0",
 *     title="Sneaker Shop Category API Testing ",
 *     description="Example info",
 *     @OA\Contact(name="Swagger API Team")
 * )
 * @OA\Server(
 *     url="http://localhost/SneakerShopProject/rest/routes",
 *     description="API server"
 * )
 */
/**
 * @OA\Post(
 *     path="/",
 *     summary="adds a new category",
 *     description="Adds a new category",
 *     operationId="addCategory",
 *     tags={"category"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="categoryName",
 *                     type="string"
 *                 ),
 *                
 *                 example={"categoryName" : "adult"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             oneOf={
 *                 @OA\Schema(type="boolean")
 *             },
 *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
 *             @OA\Examples(example="bool", value=false, summary="A boolean value."),
 *         )
 *     )
 * )
 */
Flight::route("GET /categories", function(){
    Flight::json(Flight::category_service()->get_all());
});

Flight::route('GET /categories_filter', function(){
    // Your SQL query to retrieve users from the database
    $sql = "SELECT categoryID, categoryName FROM category";
    
    // Execute the query and fetch the results
    $category = Flight::db()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the results as a JSON-encoded array
    Flight::json($category);
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