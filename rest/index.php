<?php

require '../vendor/autoload.php';
require 'services/SizeService.php';
require_once './routes/SizeRoutes.php';
Flight::register("size_service", "SizeService");
Flight::json(Flight::size_service()->get_all());

Flight::register("category_services", "CategoryService");

?>