<?php


//require_once('PaymentGateway/Stripe/Transaction.php');
//require_once('PaymentGateway/Paddle/CustomerProfile.php');
//require_once('../PaymentGateway/Paddle/Transaction.php');
//require_once('./namespace/app/PaymentGateway/Paddle/Transaction.php');

//require_once('../app/PaymentGateway/Paddle/Transaction.php');
//string(33) "PaymentGateway\Paddle\Transaction"
// spl_autoload_register(function($class){

//     $class =  str_replace('\\', '/', $class). '.php';
//     var_dump($class);
// });

$a = '../app/PaymentGateway/Paddle/Transaction.php';
//echo __DIR__;
//require_once(__DIR__ . '/' . $a);
require_once($a);


 use PaymentGateway\Paddle\Transaction;

 $paddleTransaction = new Transaction();

// var_dump($paddleTransaction);

