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
            $table->text('shipping_street_address');
            $table->text('shipping_city');
            $table->text('shipping_state_province')->nullable();
            $table->text('shipping_postal_code');
            $table->text('shipping_country');


            // Order details
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');

            $table->enum('payment_status', ['paid','unpaid'])->default('unpaid'); // Payment status of the order


            $table->timestamp('ordered_at')->useCurrent(); // When the order was placed
            // $table->timestamp('shipped_at')->nullable(); // When the order is shipped
            // $table->timestamp('delivered_at')->nullable(); // When the order is delivered
            // $table->timestamp('cancelled_at')->nullable(); // When the order is cancelled

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
