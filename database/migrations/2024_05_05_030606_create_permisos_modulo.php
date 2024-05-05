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
        Schema::create('permisos_modulo', function (Blueprint $table) {
            $table->uuid("id_permisos_modulo")->primary();
            $table->char("id_modulo",36);
            $table->foreign("id_modulo")->on("modulo")->references("id_modulo")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("referencia_permisos_modulo",150);
            $table->text("descripcion_permisos_modulo");
            $table->enum("tipo_accion",["CLICK","INTERACTUAR","ACTION"]);
            $table->enum("status_permisos_modulo",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos_modulo');
    }
};
