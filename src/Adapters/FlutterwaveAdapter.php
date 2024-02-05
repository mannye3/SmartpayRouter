<?php

namespace Blinqpackage\SmartpayRouter\Adapters;

use Illuminate\Support\Facades\Log;
use Blinqpackage\SmartpayRouter\PaymentRouters\Flutterwave;
use Blinqpackage\SmartpayRouter\Contracts\PaymentRouterInterface;


class FlutterwaveAdapter implements PaymentRouterInterface
{

    private $flutterwave;

    public function __construct(Flutterwave $flutterwave)
    {
        $this->flutterwave = $flutterwave;
    }

    /**
     * @param 
     * @return
     */
    public function initiatePayment(array $data)
    {
        return $this->flutterwave->initiatePayment(
            $data['amount'],
            $data['email'],
            $data['currency'],
            $data['tran_ref'],
            $data['gateway'],
        );
    }

    public function verifyPayment(string $transactionId): string
    {
        return $this->flutterwave->verifyPayment($transactionId);
    }
}
