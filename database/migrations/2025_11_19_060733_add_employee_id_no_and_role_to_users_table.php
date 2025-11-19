<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_id_no')->unique()->after('id');
            $table->string('status')->after('password');
            $table->string('c_number')->after('status');
            $table->string('role')->after('c_number');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('employee_id_no');
            $table->dropColumn('status');
            $table->dropColumn('c_number');
            $table->dropColumn('role');
        });
    }
};
