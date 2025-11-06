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
        Schema::create('call_number', function (Blueprint $table) {
            $table->id();
            $table->integer('call_number');
            $table->integer('parent_id');
            $table->integer('sub_parent_id');
            $table->string('call_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_number');
    }
};
