<?php

use App\Router;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$router = new Router();

$router
    ->get('/', [App\Controllers\HomeController::class, 'index'])
    ->post('/upload', [App\Controllers\HomeController::class, 'upload'])
    ->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [App\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [App\Controllers\InvoiceController::class, 'store']);

(new App\App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'],'method' => $_SERVER['REQUEST_METHOD']], 
    [
    'host' =>$_ENV['DB_HOST'],
     'user' =>  $_ENV['DB_USER'],
     'pass' => $_ENV['DB_PASS'],
     'database' => $_ENV['DB_DATABSE'],
     'driver' => $_ENV['DB_DRIVER'] ?? 'mysql'
     ]
 
 ))->run();

               
