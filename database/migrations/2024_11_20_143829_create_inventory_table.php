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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id(); // ID auto incremental (clave primaria)
            $table->string('descripcion'); // Descripción del producto
            $table->string('unidad'); // Unidad de medida (e.g., "kg", "litro", "pieza")
            $table->integer('cantidad')->default(0); // Cantidad en stock, inicia en 0
            $table->decimal('precio', 10, 2); // Precio con precisión decimal (10 dígitos, 2 decimales)
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
