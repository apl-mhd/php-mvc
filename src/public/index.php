<?php

declare(strict_types = 1);

use App\Invoice;

require __DIR__ . '/../vendor/autoload.php';


$invoice1 = new Invoice();
$invoice2 = $invoice1;

echo 'Unsetting  invoice 1' . PHP_EOL;
unset($invoice1);

var_dump($invoice2);

