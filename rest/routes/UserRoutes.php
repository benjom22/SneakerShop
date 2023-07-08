<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


 /**
* @OA\Post(
*     path="/login", 
*     description="Login",
*     tags={"login"},
*     security={{"ApiKeyAuth": {}}},
*     @OA\RequestBody(description="Login", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*             @OA\Property(property="email", type="string", example="demo@gmail.com",	description="Admin email" ),
*             @OA\Property(property="password", type="string", example="12345",	description="Password" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Logged in successfuly"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('POST /login', function(){
  $login = Flight::request()->data->getData();
  $user = Flight::userDao()->get_user_by_email($login['email']);
  if(count($user) > 0){
      $user = $user[0];
  }
  if (isset($user['id'])){
    if($user['password'] == md5($login['password'])){
      $expiration_time = time() + 3600;
      $userData = [
          'id' => $user['id'],
          'email' => $user['email'],
          'exp' => $expiration_time
      ];
      unset($user['password']);
      //$user['is_admin'] = false;
      $jwt = JWT::encode($userData, Config::JWT_SECRET(), 'HS256');
      Flight::json(['token' => $jwt]);
    }else{
      Flight::json(["message" => "Wrong password"], 404);
    }
  }else{
    Flight::json(["message" => "User doesn't exist"], 404);
  }
});




 ?>
