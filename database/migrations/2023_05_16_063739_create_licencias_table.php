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
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_conductor');
            // $table->string('razon_social');
            // $table->string('domicilio');
            $table->string('ruta');
            $table->string('placa');
            $table->string('codigo');
            $table->string('empresa');
            $table->enum('estado', ['autorizado', 'no_autorizado'])->default('autorizado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licencias');
    }
};
