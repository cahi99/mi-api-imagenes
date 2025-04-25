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
        Schema::create('images', function (Blueprint $table) {
                    $table->id(); // Clave primaria autoincremental

                    // Clave foránea a la tabla users
                    $table->foreignId('user_id')->constrained()->onDelete('cascade');
                    $table->string('path'); // Para guardar la ruta del archivo en el disco
                    $table->string('original_name')->nullable(); //
                    $table->string('mime_type')->nullable(); // Tipo MIME del archivo
                    $table->timestamps(); // Añade las columnas 'created_at' y 'updated_at'
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
