<?php

// app\Models\PaymentLog.php



namespace Blinqpackage\SmartpayRouter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'amount',
        'currency',
        'gateway',
        'tran_ref',
        'status',

        // Add any additional fields you want to store
    ];
}
