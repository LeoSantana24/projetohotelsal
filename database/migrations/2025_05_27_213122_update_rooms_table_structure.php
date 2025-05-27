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
    Schema::table('rooms', function (Blueprint $table) {
        $table->dropColumn(['room_title', 'room_type']);
        $table->unsignedBigInteger('type_room_id')->after('id');
        $table->foreign('type_room_id')->references('id')->on('type_room')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->dropForeign(['type_room_id']);
        $table->dropColumn('type_room_id');
        $table->string('room_title')->nullable();
        $table->string('room_type')->nullable();
    });
}

};
