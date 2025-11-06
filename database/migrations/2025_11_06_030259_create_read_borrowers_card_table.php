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
        Schema::create('read_borrowers_card', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('book')->cascadeOnDelete();
            $table->foreignId('client_id')->constrained('client')->cascadeOnDelete();
            $table->enum('return_status', ['yes', 'no'])->default('no');
            $table->string('condition'); // In the frontend, I plan to put the condition field as a dropdown with options like "Good", "Damaged", "Lost", etc.
            $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('read_borrowers_card');
    }
};
