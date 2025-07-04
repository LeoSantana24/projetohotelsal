<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('type_room', function (Blueprint $table) {
            $table->renameColumn('nome', 'name');
        });
    }

    public function down(): void
    {
        Schema::table('type_room', function (Blueprint $table) {
            $table->renameColumn('name', 'nome');
        });
    }
};
