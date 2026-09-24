<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visa_services', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('slug')->unique();
            $table->string('flag_icon')->nullable();
            $table->string('visa_type'); // Tourist, Business, Student, Processing, Consultancy
            $table->decimal('price', 10, 2);
            $table->string('processing_time');
            $table->string('validity')->nullable();
            $table->json('required_documents');
            $table->text('details')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visa_services');
    }
};
