<?php

namespace Blinqpackage\SmartpayRouter\PaymentRouters;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Blinqpackage\SmartpayRouter\Contracts\PaymentRouterInterface;


class Flutterwave
{

    public function __construct()
    {
    }


    public function initiatePayment(
        float|int $amount,
        string $email,
        string $currency,
        string $tran_ref,
    ) {

        try {
            // $log = log->create($payload)
            $response = Http::withToken('FLWSECK_TEST-06436937225b106a42f48e192ff0dc89-X')->post(
                'https://api.flutterwave.com/v3/payments',
                [


                    'payment_options' => 'card,banktransfer',
                    'amount' => $amount,
                    'email' => $email,
                    'tx_ref' => $tran_ref,
                    'currency' => $currency,
                    'redirect_url' => 'http://example.',
                    'customer' => [
                        'email' => $email,
                        "phone_number" => '08062165573',
                        "name" => 'Manny'
                    ],

                    "customizations" => [
                        "title" => 'Amazon Purchase',

                    ]
                ]
            )->json();


            Log::error($response);
            Log::error('kk_' . $response['message']);
            if ($response['status'] === 'success') {
                return ['res' => $response, 'gateway' => 'flutterwave'];
            }
        } catch (\Exception $e) {
        }
    }

    public function verifyTransfer(string $transactionId): string
    {
        return $transactionId;
    }
}
