<?php


//require_once('PaymentGateway/Stripe/Transaction.php');
//require_once('PaymentGateway/Paddle/CustomerProfile.php');
//require_once('../PaymentGateway/Paddle/Transaction.php');
//require_once('./namespace/app/PaymentGateway/Paddle/Transaction.php');

echo __DIR__ . PHP_EOL;
spl_autoload_register(function($class){

    $path  = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $class). '.php');
    require $path;
});



use App\PaymentGateway\Paddle\Transaction;
use App\PaymentGateway\Stripe\Transaction as t;
use App\PaymentGateway\Paddle\CustomerProfile;

 $paddleTransaction = new t();

 var_dump($paddleTransaction);

