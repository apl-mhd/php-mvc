<?php

use App\View;
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');


try{
$router = new  App\Router();

$router
    ->get('/', [App\Controllers\HomeController::class, 'index'])
    ->post('/upload', [App\Controllers\HomeController::class, 'upload'])
    ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [App\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [App\Controllers\InvoiceController::class, 'store']);

echo $router->resolve(
    $_SERVER['REQUEST_URI'],
     strtolower($_SERVER['REQUEST_METHOD'])
    );

}
catch(\App\Exceptions\RouteNotFoundException $e){

    http_response_code(404);
    echo View::make('error/404');
}
