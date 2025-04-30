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
    Schema::table('bookings_massage', function (Blueprint $table) {
        $table->string('duration')->nullable(); // Adiciona a coluna duration
    });
}

public function down(): void
{
    Schema::table('bookings_massage', function (Blueprint $table) {
        $table->dropColumn('duration'); // Remove a coluna duration em caso de rollback
    });
}

};
