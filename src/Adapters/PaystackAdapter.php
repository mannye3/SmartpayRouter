<?php

namespace Blinqpackage\SmartpayRouter\Adapters;

use Illuminate\Support\Facades\Log;
use Blinqpackage\SmartpayRouter\PaymentRouters\Paystack;
use Blinqpackage\SmartpayRouter\Contracts\PaymentRouterInterface;
//use Blinqpackage\SmartpayRouter\Exceptions\InternalServerException;

class PaystackAdapter implements PaymentRouterInterface
{
    protected $paystack;

    public function __construct(Paystack $paystack)
    {
        $this->paystack = $paystack;
    }


    /**
     * @param 
     * @return
     */
    public function initiatePayment(array $data)
    {
        Log::debug($data);
        return $this->paystack->initiatePayment($data['amount']);
    }

    public function verifyPayment(string $transactionId): string
    {
        return $this->paystack->verifyPayment($transactionId);
    }
}
