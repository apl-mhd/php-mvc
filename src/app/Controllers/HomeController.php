<?php

declare(strict_types=1);

namespace App\Controllers;

use PDO;
use App\App;
use App\View;
use App\Container;
use Exception;
use PDOException;
use App\Models\User;
use App\Models\Invoice;
use App\Models\SignUp;
use App\Services\InvoiceService;

class HomeController
{
    public function __construct(private InvoiceService $invoiceService)
    {
         
    }

    public function index(): View
    {   
        $this->invoiceService->process([], 25);

        return View::make('index');

    }

}
