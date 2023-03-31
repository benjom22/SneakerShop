<?php
require '../vendor/autoload.php';
require './services/UserService.php';
require_once './routes/UserRoutes.php';
Flight::register('product_service','ProductService');
Flight::register('user_service', 'UserService');

?>