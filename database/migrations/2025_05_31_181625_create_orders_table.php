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

            $table->uuid('id')->primary();

            $table->uuid('product_id');

            // Customer information
            $table->string('user_email');
            $table->string('user_name');
            $table->string('user_phone');


            // Enhanced shipping information
            $table->string('shipping_street_address');
            $table->string('shipping_city');
            $table->string('shipping_state_province')->nullable();
            $table->string('shipping_postal_code');
            $table->string('shipping_country', 2);


            // Order details
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');

            $table->timestamp('ordered_at')->useCurrent(); // When the order was placed
            $table->timestamp('shipped_at')->nullable(); // When the order is shipped
            $table->timestamp('delivered_at')->nullable(); // When the order is delivered
            $table->timestamp('cancelled_at')->nullable(); // When the order is cancelled

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
