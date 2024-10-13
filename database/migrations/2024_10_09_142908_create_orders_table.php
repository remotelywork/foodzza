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
            $table->string('order_number');
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->string('quantity');
            $table->string('promo_code')->nullable();
            $table->string('promo_discount')->default(0);
            $table->json('billing_details');
            $table->string('delivery_status');
            $table->string('total_amount');
            $table->string('payment_method');
            $table->string('txn_id')->nullable();
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
