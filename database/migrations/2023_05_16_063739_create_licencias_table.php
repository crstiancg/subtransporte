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
            $table->string('cod_empresa');
            $table->string('razon_social');
            $table->string('domicilio');
            $table->string('ruc');
            $table->string('representante');
            $table->string('tipo_servicio');
            $table->string('tipo_vehiculo');
            $table->string('nro_vehiculo');
            $table->string('doc_autorizacion');
            $table->string('fecha_autorizacion');
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
