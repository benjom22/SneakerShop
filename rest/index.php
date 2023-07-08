<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';
require "services/SizeService.php";
require "services/CategoryService.php";
require "services/ColorService.php";
require "services/OrderService.php";
require "services/PaymentService.php";
require "services/ProductService.php";
require "services/UserService.php";
require "services/VendorService.php";

Flight::register("size_service", "SizeService");
Flight::register("category_service", "CategoryService");
Flight::register("color_service", "ColorService");
Flight::register("order_service", "OrderService");
Flight::register("payment_service", "PaymentService");
Flight::register("product_service", "ProductService");
Flight::register("user_service", "UserService");
Flight::register("vendor_service", "VendorService");
Flight::register('userDao', "UserDao");

require_once 'routes/SizeRoutes.php';
require_once 'routes/CategoryRoutes.php';
require_once 'routes/ColorRoutes.php';
require_once 'routes/OrderRoutes.php';
require_once 'routes/PaymentRoutes.php';
require_once 'routes/ProductRoutes.php';
require_once 'routes/UserRoutes.php';
require_once 'routes/VendorRoutes.php';

// middleware method for login
Flight::route('/*', function () {
    $path = Flight::request()->url;
    if ($path == '/login' || $path == '/docs.json') {
        return true;
    }

    $headers = getallheaders();
    if (!isset($headers['Authorization'])) {
        Flight::json(["message" => "Authorization is missing"], 403);
        return false;
    } else {
        try {
            $decoded = (array) JWT::decode($headers['Authorization'], Config::JWT_SECRET(), ['HS256']);
            $current_time = time();
            if (isset($decoded['exp']) && $decoded['exp'] < $current_time) {
                Flight::json(["message" => "Authorization token has expired"], 403);
                return false;
            }
            Flight::set('user', $decoded);
            return true;
        } catch (\Exception $e) {
            Flight::json(["message" => "Authorization token is not valid"], 403);
            return false;
        }
    }
});

  

Flight::route('GET /docs.json', function(){
    $openapi = \OpenApi\scan('routes');
    header('Content-Type: application/json');
    echo $openapi->toJson();
});

Flight::start();

?>