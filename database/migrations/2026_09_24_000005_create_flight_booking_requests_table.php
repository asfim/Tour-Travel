<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flight_booking_requests', function (Blueprint $table) {
            $table->id();
            $table->string('from_location');
            $table->string('to_location');
            $table->date('departure_date');
            $table->date('return_date')->nullable();
            $table->string('trip_type')->default('round_trip'); // one_way, round_trip, multi_city
            $table->integer('passengers_count')->default(1);
            $table->string('cabin_class')->default('Economy'); // Economy, Premium Economy, Business, First
            $table->string('passenger_name');
            $table->string('passenger_phone');
            $table->string('passenger_email');
            $table->text('notes')->nullable();
            $table->string('status')->default('Pending'); // Pending, Contacted, Confirmed, Cancelled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flight_booking_requests');
    }
};
