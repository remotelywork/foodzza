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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumb_image');
            $table->string('images')->nullable();
            $table->string('price');
            $table->string('discount_price')->nullable();
            $table->dateTime('discount_validity')->nullable();
            $table->foreignId('category');
            $table->string('quantity');
            $table->longText('overview')->nullable();
            $table->string('complimentary_items')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
