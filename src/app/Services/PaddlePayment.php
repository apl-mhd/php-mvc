<?php
declare(strict_types=1);

namespace App\Services;

class PaddlePayment implements PaymentGateWayInterFace
{

    public function charge(array $customer, float $amount, $tax):bool
    {
        echo 'Charging from paddle <br/>';

        return (bool) mt_rand(0,1);
    }
}