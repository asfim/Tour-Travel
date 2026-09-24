<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_tour_requests', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->date('travel_date')->nullable();
            $table->integer('duration_days')->default(3);
            $table->string('budget_range')->nullable();
            $table->integer('travelers_count')->default(2);
            $table->string('hotel_category')->nullable();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('details')->nullable();
            $table->string('status')->default('Pending'); // Pending, Processing, Quoted, Closed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_tour_requests');
    }
};
