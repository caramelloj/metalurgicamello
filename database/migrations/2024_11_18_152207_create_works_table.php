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
        Schema::create('works', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('titulo'); // Campo de texto corto para el título
            $table->text('detalle'); // Campo de texto largo
            $table->decimal('costo_materiales', 10, 2)->default(0); // Costo de materiales con 2 decimales
            $table->decimal('costo_trabajo', 10, 2)->default(0); // Costo de trabajo con 2 decimales
            $table->integer('horas_trabajadas')->default(0); // Número entero para horas trabajadas
            $table->date('fecha_inicio'); // Fecha de inicio
            $table->date('fecha_fin'); // Fecha de fin
            $table->json('materiales'); // Almacena materiales en formato JSON
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->string('nombre_cliente');
            $table->json('imagenes'); // Campo JSON para varias imágenes
            $table->timestamps(); // Campos de marca de tiempo (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
