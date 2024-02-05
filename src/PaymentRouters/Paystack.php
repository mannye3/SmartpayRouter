<?php

namespace Blinqpackage\SmartpayRouter\PaymentRouters;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Blinqpackage\SmartpayRouter\Contracts\PaymentRouterInterface;


class Paystack
{

    public function __construct()
    {
    }

    /**
     * @param 
     * @return
     */





    public function initiatePayment(float|int $amount)
    {
        try {
            $response = Http::withToken('sk_test_fd69ec83c78370122673ee8fecee066f446971ce')->post(
                'https://api.paystack.co/transaction/initialize',
                [
                    "email" => "customer@email.com",
                    "amount" => "20000"
                ]
            )->json();

            return ['res' => $response, 'gateway' => 'Paystack'];
            // return $response;
        } catch (\Exception $e) {
        }
    }

    public function verifyPayment(string $transactionId): string
    {
        return $transactionId;
    }
}
