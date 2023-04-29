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
        Schema::create('tipos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',100);
            $table->double('des_base');
            $table->double('des_dia');
            $table->double('des_doc');
            $table->decimal('porcentaje_base', 3,2);
            $table->decimal('porcentaje_dia', 3,2);
            $table->decimal('porcentaje_doc', 3,2);
            $table->double('monto_base');
            $table->double('monto_dia');
            $table->double('monto_doc');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos');
    }
};
