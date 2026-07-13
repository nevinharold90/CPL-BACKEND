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
        Schema::create('book_copies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('books')->cascadeOnDelete();
            $table->string('barcode_data')->unique()->nullable();
            $table->string('qrcode_data')->unique()->nullable();
            $table->string('accession_number_id')->unique();
            $table->string('category')->nullable(); //General circulation, Reference, etc.
            $table->string('condition')->nullable(); //new, good, some wear, damaged
            $table->string('source_of_fund')->nullable(); //donated, purchased
            $table->string('status'); //available','not available', '', 'donated', 'walk-in', 'lost'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_copies');
    }
};
