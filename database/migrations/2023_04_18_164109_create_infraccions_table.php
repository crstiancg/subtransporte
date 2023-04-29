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
        Schema::create('infraccions', function (Blueprint $table) {
            $table->id();
            $table->string('cod_papeleta');
            $table->string('cod_placa');
            $table->string('dato_conductor');
            $table->string('cod_infraccion');
            $table->string('fecha_infraccion');
            $table->string('hora_infraccion');
            $table->string('licencia');
            $table->string('cod_registro');
            $table->string('observacion');
            $table->string('cip');
            $table->string('lugar');
            $table->string('cuadra');
            $table->string('tipoInf');
            $table->enum('estado', ['base','dias','doc']);
            $table->string('fecha_inicio');
            $table->string('fecha_cierre');
            $table->foreignId('codigo_id')->nullable()->constrained('tipos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infraccions');
    }
};
