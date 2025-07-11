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
        Schema::create('bookings_massage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_massage_id')->constrained('type_massage')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('date');  
            $table->time('hour');
            $table->string('duration');
            $table->decimal('price', 8, 2);
               
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings_massage');
    }
};

