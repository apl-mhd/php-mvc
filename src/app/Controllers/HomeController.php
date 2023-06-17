<?php

declare(strict_types=1);

namespace App\Controllers;

use PDO;
use App\App;
use App\View;
use Exception;
use PDOException;
use App\Models\User;
use App\Models\Invoice;
use App\Models\SignUp;

class HomeController
{

    public function index(): View
    {

       // $db = App::db();

        $name = 'name';
        $email = 'mail14@mail.ocm';
        $amount = 10;

        $userModel = new User();
        $invoiceModel = new Invoice();

      $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name' => $name,
            ],
            [
                'amount' => $amount,
            ]

        );

       return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
       //    return View::make('index');
    }


    public function upload()
    {

        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
    }
}
