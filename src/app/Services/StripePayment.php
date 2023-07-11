<?php
declare(strict_types=1);

namespace App\Services;

class StripePayment implements PaymentGateWayInterFace
{

    public function charge(array $customer, float $amount, $tax):bool
    {

        return (bool) mt_rand(0,1);
    }
}