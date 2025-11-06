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
        Schema::create('qr_book_image', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_image_id')->constrained('book_image')->cascadeOnDelete();
            $table->foreignId('book_id')->constrained('book')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_book_image');
    }
};
