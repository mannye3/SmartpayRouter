<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\SmartPay; // Adjust the namespace as needed
use App\Models\PaymentLog;
use App\Services\FlutterwaveAdapter; // Adjust the namespace as needed
use App\Services\PaystackAdapter; // Adjust the namespace as needed

class SmartPayTest extends TestCase
{
    public function testProcessPayment()
    {
        // Mock data for testing
        $data = [
            'tran_ref' => 'test_tran_ref',
            'amount' => 5000,
            'currency' => 'USD',
            'email' => 'test@email.com',
        ];

        // Mock the FlutterwaveAdapter and PaystackAdapter
        $flutterwaveAdapterMock = $this->createMock(FlutterwaveAdapter::class);
        $paystackAdapterMock = $this->createMock(PaystackAdapter::class);

        // Set expectations for the mock adapters
        $flutterwaveAdapterMock->expects($this->once())
            ->method('initiatePayment')
            ->with($data)
            ->willReturn(['res' => ['status' => 1], 'gateway' => 'Flutterwave']);

        $paystackAdapterMock->expects($this->never())
            ->method('initiatePayment');

        // Override the make method to return the mock adapter based on conditions
        $this->app->bind(FlutterwaveAdapter::class, function () use ($data, $flutterwaveAdapterMock) {
            return $data['amount'] > 200000 ? $flutterwaveAdapterMock : null;
        });

        $this->app->bind(PaystackAdapter::class, function () use ($data, $paystackAdapterMock) {
            return $data['currency'] !== 'USD' ? $paystackAdapterMock : null;
        });

        // Call the processPayment method
        $result = SmartPay::processPayment($data);

        // Assert the result
        $this->assertEquals(['res' => ['status' => 1], 'gateway' => 'Flutterwave'], $result);

        // Assert the payment log entry
        $this->assertDatabaseHas('payment_logs', [
            'email' => $data['email'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'tran_ref' => $data['tran_ref'],
            'status' => 'success',
            'gateway' => 'Flutterwave',
        ]);
    }
}
