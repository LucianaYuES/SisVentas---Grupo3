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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nombre'); // Nombre del producto
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->decimal('precio', 10, 2); // Precio con dos decimales
            $table->unsignedBigInteger('category_id'); // Relación con categories
            $table->integer('stock')->default(0); // Stock inicial por defecto en 0
            $table->timestamps(); // created_at y updated_at

            // Llave foránea
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
