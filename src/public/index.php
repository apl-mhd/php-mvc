<?php
require __DIR__ . '/../vendor/autoload.php';
session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
$router = new  App\Router();


$router
    ->get('/', [App\Classes\Home::class, 'index'])
    ->post('/upload', [App\Classes\Home::class, 'upload'])
    ->get('/invoices', [App\Classes\Invoice::class, 'index'])
    ->get('/invoices/create', [App\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [App\Classes\Invoice::class, 'store']);

// $path = __DIR__ . '/../storage/';
// $realPath = readlink($path);

// var_dump($realPath);
// var_dump(realpath($path));


echo $router->resolve(
    $_SERVER['REQUEST_URI'],
     strtolower($_SERVER['REQUEST_METHOD'])
    );

