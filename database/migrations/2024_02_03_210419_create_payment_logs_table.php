<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->decimal('amount', 10, 2);
            $table->string('currency');
            $table->string('gateway');
            $table->string('tran_ref');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_logs');
    }
};






















// <?php


// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('payment_logs', function (Blueprint $table) {
//             $table->id();
//             $table->unsignedBigInteger('user_id');
//             $table->decimal('amount', 10, 2);
//             $table->string('status');
//             $table->timestamp('payment_date')->nullable();
//             // add other fields as needed
//             $table->timestamps();

//             // Define foreign key relationship
//             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('payment_logs');
//     }
// }
