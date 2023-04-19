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
            $table->string('cod_placa', 6);
            $table->string('dato_conductor');
            $table->string('fechaInf');
            $table->string('horaInf');
            $table->string('licencia');
            $table->string('cod_registro');
            $table->string('observacion');
            $table->string('cip');
            $table->string('lugar');
            $table->string('cuadra');
            $table->string('tipoInf');
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
