<?php
use OpenApi\Annotations as OA;
require 'vendor/autoload.php';
$openapi = \OpenApi\Generator::scan(['C:\wamp64\www\SneakerShopProject\rest\routes']);
header ('Content-Type:application/json');
echo $openapi->toJson();

?>