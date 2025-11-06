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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->integer('accession_number_id')->unique();
            $table->foreignId('call_number_id')->constrained('call_number')->cascadeOnDelete();
            $table->string('qr_data')->unique();
            // $table->foreignId('qr_book_image_id')->constrained('qr_book_image')->cascadeOnDelete();
            $table->enum('status', ['available', 'checked_out', 'reserved', 'lost'])->default('available');
            $table->integer('year_published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
