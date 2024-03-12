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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('short_description');
            $table->text('long_description');
            $table->unsignedInteger('price')->default(1);
            $table->unsignedInteger('offer_price')->nullable();
            $table->integer('quantity')->default(1);;
            $table->integer('is_featured')->default(0)->comment('0=No, 1=Yes');
            $table->integer('product_type')->default(0)->comment('0=Physical, 1=Digital, 2=Organic');
            //$table->json('image')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->string('mfg_date')->nullable();
            $table->string('exp_date')->nullable();
            $table->string('sku_code')->nullable();
            $table->json('product_tags')->nullable();            
            $table->text('additional_info')->nullable();
            $table->integer('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
