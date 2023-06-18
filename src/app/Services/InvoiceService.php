<?php

declare(strict_types=1);
namespace App\Services;


class InvoiceService
{
    public function __construct(
        protected SaleTaxService $saleTaxService,
        protected PaymentGateWayService $gateWayService, 
        protected EmailService $emailService
    )
    {
        
    }

    public function process(array $customer, float $amount): bool
    {
      

        //1. calculate sales tax
        $tax = $this->saleTaxService->calculate($amount, $customer);

        //2. process invoice
        if(! $this->gateWayService->charge($customer, $amount, $tax)) {
            return false;
        }

        //3. send receipt
        $this->emailService->send($customer, 'receipt');

        return true;
    }
}