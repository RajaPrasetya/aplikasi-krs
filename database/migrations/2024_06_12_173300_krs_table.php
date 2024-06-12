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
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->string('NIM');
            $table->string('kode_mk');
            $table->integer('nilai')->nullable();

            $table->foreign('NIM')->references('NIM')->on('users')->onDelete('cascade');
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_matakuliah');
    }
};
