<?php
use App\Router;
require __DIR__ . '/../vendor/autoload.php';


$router = new  App\Router();

$router->register('/', function (){
    echo  'Home';
});


$router->register('/invoices', function (){

    echo  'Invoice';
});

echo $router->resolve($_SERVER['REQUEST_URI']);