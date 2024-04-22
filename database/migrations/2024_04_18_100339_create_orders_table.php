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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('inv_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('thana_id');
            $table->string('post_code');
            $table->string('payment_method')->nullable()->comment("1 = COD, 2 = SSL");
            $table->string('status')->nullable()->comment("1=Pending, 2=Processing, 3=On Hold, 4=Confirmed, 5=Completed, 6=Canceled, 7=Failed");
            // Payment Gateway Info
            $table->string('transaction_id')->nullable();
            $table->integer('total_price');
            $table->integer('delivery_fee');
            $table->integer('discount_amount');
            $table->integer('paid_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
