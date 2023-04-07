<?php
require '../vendor/autoload.php';
require 'services/ProductService.php';
require_once './routes/ProductRoute.php';
#$product_service = new ProductService();

Flight::register("product_service", "ProductService");
Flight::json(Flight::product_service()->get_all());
?>