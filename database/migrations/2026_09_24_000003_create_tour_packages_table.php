<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('destination_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('tour_categories')->onDelete('set null');
            $table->integer('duration_days');
            $table->integer('duration_nights');
            $table->decimal('starting_price', 12, 2);
            $table->decimal('original_price', 12, 2)->nullable();
            $table->decimal('rating', 3, 2)->default(4.8);
            $table->integer('reviews_count')->default(12);
            $table->text('short_description');
            $table->longText('overview');
            $table->json('itinerary'); // array of [{day: 1, title: '...', description: '...'}]
            $table->json('inclusions'); // array of strings
            $table->json('exclusions'); // array of strings
            $table->text('hotel_info')->nullable();
            $table->text('transport_info')->nullable();
            $table->string('cover_image');
            $table->json('gallery')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_domestic')->default(false);
            $table->boolean('is_international')->default(false);
            $table->boolean('is_hajj_umrah')->default(false);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};
