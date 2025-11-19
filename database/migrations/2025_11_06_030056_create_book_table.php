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
            $table->string('qr_id')->unique();
            $table->string('accession_number_id')->unique();
            $table->foreignId('call_number_id')->constrained('call_number')->cascadeOnDelete();
            $table->foreignId('users_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->string('status'); //available', 'donated', 'walk-in', 'lost'
            $table->string('category')->nullable(); //General circulation, Reference, etc.
            $table->string('condition')->nullable(); //new, good, some wear, damaged
            $table->string('source_of_fund')->nullable(); //donated, purchased
            $table->date('year_published');
            $table->timestamps();
            // $table->foreignId('qr_book_image_id')->constrained('qr_book_image')->cascadeOnDelete();
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
