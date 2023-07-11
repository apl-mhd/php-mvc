<?php
declare(strict_types=1);

namespace App\Services;

interface PaymentGateWayInterFace
{
    public function charge(array $customer, float $amount, $tax):bool;
}