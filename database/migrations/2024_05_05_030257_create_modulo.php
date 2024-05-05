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
        Schema::create('modulo', function (Blueprint $table) {
            $table->uuid("id_modulo")->primary();
            $table->string("referencia_modulo",150);
            $table->string("nombre_modulo",150);
            $table->text("descripcion")->nullable();
            $table->enum("status_modulo",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modulo');
    }
};
