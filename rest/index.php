<?php
require '../vendor/autoload.php';
require 'services/ProductService.php';
require_once './routes/ProductRoute.php';
$product_service = new ProductService();
Flight::json($product_service->get_all());
?>