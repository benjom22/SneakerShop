<?php
require 'vendor/autoload.php';

Flight::rout('/', function(){
    echo 'Hello world';
});

Flight::start();

?>