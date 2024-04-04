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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('code')->unique();
            $table->float('discount_amount');
            $table->tinyInteger('status')->default(1)->comment('enable=1, disable=0');
            $table->tinyInteger('type')->default(0)->comment('percent=1, fixed=0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
