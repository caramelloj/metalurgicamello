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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Crea un campo 'id' como clave primaria autoincrementable
            $table->string('name'); // Campo 'name' tipo string
            $table->string('cuit_cuil'); // Campo 'cuit_cuil' tipo entero (puede ser bigInteger si es muy grande)
            $table->string('address'); // Campo 'address' tipo string
            $table->string('phone'); // Campo 'phone' tipo string, se asume que se guardará en formato texto
            $table->bigInteger('saldo'); // Campo 'saldo' tipo entero (puede ser bigInteger si el saldo es grande)
            $table->timestamps(); // Campos 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
