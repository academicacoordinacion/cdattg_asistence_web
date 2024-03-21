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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            // añadir columnas
            $table->string('name')->unique();
            $table->boolean('status')->default(1);
            $table->foreignId('user_create_id')->constrained('users');
            $table->foreignId('user_edit_id')->constrained('users');
            // termina de añador columnas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};