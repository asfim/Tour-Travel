<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('tour_package_id')->constrained()->onDelete('cascade');
            $table->date('travel_date');
            $table->integer('adults_count')->default(1);
            $table->integer('children_count')->default(0);
            $table->decimal('total_price', 12, 2);
            $table->decimal('paid_amount', 12, 2)->default(0);
            $table->string('payment_status')->default('Pending'); // Pending, Paid, Partial, Failed, Refunded
            $table->string('booking_status')->default('Pending'); // Pending, Confirmed, Cancelled, Completed
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('passport_number')->nullable();
            $table->text('special_requests')->nullable();
            $table->string('payment_method')->nullable(); // bKash, Nagad, SSLCommerz, Bank, Manual, Cash
            $table->string('transaction_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
