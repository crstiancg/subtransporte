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
            $table->string('cod_papeleta')->nullable();
            $table->string('cod_placa')->nullable();
            $table->string('dato_conductor')->nullable();
            $table->string('cod_infraccion')->nullable();
            $table->string('fecha_infraccion')->nullable();
            $table->string('hora_infraccion')->nullable();
            $table->string('licencia')->nullable();
            $table->string('cod_registro')->nullable();
            $table->string('observacion')->nullable();
            $table->string('cip')->nullable();
            $table->string('lugar')->nullable();
            $table->string('cuadra')->nullable();
            $table->string('tipoInf')->nullable();
            $table->enum('estado', ['base','dias','doc'])->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_cierre')->nullable();
            $table->string('monto_final')->nullable();
            $table->foreignId('tipo_id')->nullable()->constrained();

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
