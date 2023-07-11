<?php

declare(strict_types=1);
namespace App\Services;


class InvoiceService
{
    public function __construct(
        protected SaleTaxService $saleTaxService,
        protected PaymentGateWayInterFace $paymentGetWay, 
        protected EmailService $emailService
    )
    {
        
    }

    public function process(array $customer, float $amount): bool
    {
      

        //1. calculate sales tax
        $tax = $this->saleTaxService->calculate($amount, $customer);

        //2. process invoice
        if(! $this->paymentGetWay->charge($customer, $amount, $tax)) {
            return false;
        }

        //3. send receipt
        $this->emailService->send($customer, 'receipt');

        echo 'Invoice has been processed <br/>';
        
        return true;
    }
}