<?php

namespace Blinqpackage\SmartpayRouter;





use Illuminate\Support\Facades\Log;
use Blinqpackage\SmartpayRouter\Models\PaymentLog;
use Blinqpackage\SmartpayRouter\PaymentRouters\Paystack;
use Blinqpackage\SmartpayRouter\Adapters\PaystackAdapter;
use Blinqpackage\SmartpayRouter\Adapters\FlutterwaveAdapter;

class SmartPay
{
    protected $paymentGateway;

    public function __construct()
    {
    }



    public static function processPayment($data)
    {

        // return  $data;
        $selectedPaymentGateway = match (true) {
            $data['amount'] > 200000 =>  app()->make(FlutterwaveAdapter::class),
            $data['currency'] !== 'USD' => app()->make(PaystackAdapter::class),
            default => app()->make(FlutterwaveAdapter::class),
        };

        $resp =  $selectedPaymentGateway->initiatePayment($data);

        $status =  $resp['res']['status'];

        if ($status == 1) {
            $status = 'success';
        }
        $gateway =  $resp['gateway'];

        // Log payment details


        PaymentLog::create([
            'email' => $data['email'],
            'amount' => $data['amount'],
            'currency' =>  $data['currency'],
            'tran_ref' => $data['tran_ref'],
            'status' => $status,
            'gateway' => $gateway,
        ]);






        return $selectedPaymentGateway->initiatePayment($data);
    }
}
