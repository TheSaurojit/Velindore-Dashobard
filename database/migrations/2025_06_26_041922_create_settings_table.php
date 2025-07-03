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
        Schema::create('settings', function (Blueprint $table) {

            $table->id();
            $table->string('payment_api_key')->nullable();
            $table->string('payment_tax')->default(0); 

            $table->text('home_title')->nullable(); 
            
            $table->text('contact_email')->nullable(); 
            $table->text('contact_number')->nullable(); 

            $table->text('facebook_link')->nullable(); // JSON or text field for social media links
            $table->text('instagram_link')->nullable(); // JSON or text field for social media links
            $table->text('linkedin_link')->nullable(); // JSON or text field for social media links

             // Unique key for each setting

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
