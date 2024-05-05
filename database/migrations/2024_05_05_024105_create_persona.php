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
        Schema::create('persona', function (Blueprint $table) {
            $table->uuid("id_persona")->primary();
            $table->string("cedula",10);
            $table->string("nombre",150);
            $table->string("apellido",150);
            $table->date("fecha_nacimiento");
            $table->enum("status_persona",["ACTIVO","INACTIVO"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
