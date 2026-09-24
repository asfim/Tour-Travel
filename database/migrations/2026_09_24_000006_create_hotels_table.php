<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('location');
            $table->foreignId('destination_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('rating', 3, 2)->default(4.5);
            $table->decimal('price_per_night', 10, 2);
            $table->string('cover_image');
            $table->json('gallery')->nullable();
            $table->string('address');
            $table->json('amenities')->nullable(); // WiFi, Swimming Pool, Gym, Breakfast included, etc.
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
