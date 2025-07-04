<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('type_room', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome do tipo de quarto (ex: "Duplo Deluxe")
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('type_room');
    }
};
