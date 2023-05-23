<?php

namespace App\Classes;

class Invoice{

    public function index() : string{

        return 'invoices';
    }

    public function create() :string{

        return 'invoice create';
    }
}