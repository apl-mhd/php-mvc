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


class HomeController
{

    public function index(): View
    {

        $db = App::db();

        $name = 'name';
        $email = 'mail10@mail.ocm';

        $amount = 10;

        try {
            $db->beginTransaction();

            $userModel = new User();
            $invoiceModel = new Invoice();

            $userId = $userModel->create($email, $name);
            $invoiceId = $invoiceModel->create($amount, $userId);

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }

            throw $e;
        }

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
        //   return View::make('index');
    }


    public function upload()
    {

        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
    }
}
