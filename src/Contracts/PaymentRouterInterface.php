<?php

namespace Blinqpackage\SmartpayRouter\Contracts;

interface PaymentRouterInterface

{
    public function initiatePayment(array $data);

    public function verifyPayment(string $transactionId);
}
