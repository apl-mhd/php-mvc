<?php

namespace Tests\Unit\Services;

use App\Services\EmailService;
use PHPUnit\Framework\TestCase;
use App\Services\InvoiceService;
use App\Services\PaymentGateWayService;
use App\Services\SaleTaxService;

class InvoiceServiceTest extends TestCase
{
    /** @test */
    public function it_process_invoice(): void
    {
        $salesTaxServiceMock = $this->createMock(SaleTaxService::class);
        $gatewayServiceMock = $this->createMock(PaymentGateWayService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $gatewayServiceMock->method('charge')->willReturn(true);

        $invoiceService = new InvoiceService($salesTaxServiceMock, $gatewayServiceMock, $emailServiceMock);

        $customer = ['name' => 'gio'];
        $amount = 150;

        $result = $invoiceService->process($customer, $amount);
        $this->assertTrue($result);

    }

    /** @test */
    public function it_sends_receipt_email_when_invoice_is_processed(): void
    {
        $customer = ['name' => 'Gio'];
        $salesTaxServiceMock = $this->createMock(SaleTaxService::class);
        $gatewayServiceMock = $this->createMock(PaymentGateWayService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $gatewayServiceMock->method('charge')->willReturn(true);
      
        $emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->with( $customer = ['name' => 'Gio'], 'receipt');

        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );
        
        $amount = 150;

        $result = $invoiceService->process($customer, $amount);

        $this->assertTrue($result);

    }
}
