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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('dni')->unique();
            $table->string('nombres', 20);
            $table->string('apellidos', 20);
            $table->string('genero', 20)->nullable();
            $table->integer('telefono')->nullable();
            $table->string('direccion', 40)->nullable();
            $table->string('tipo_alumno', 20)->nullable();
            $table->string('imagen')->nullable();
            $table->integer('estado')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
