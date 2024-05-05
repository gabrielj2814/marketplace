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
        Schema::create('respuesta_seguridad_cliente', function (Blueprint $table) {
            $table->uuid("id_respuesta_seguridad_cliente")->primary();
            $table->char("id_cliente",36);
            $table->foreign("id_cliente")->on("cliente")->references("id_cliente")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_pregunta_seguridad",36);
            $table->foreign("id_pregunta_seguridad")->on("pregunta_seguridad")->references("id_pregunta_seguridad")->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum("status_respuesta_seguridad_cliente",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuesta_seguridad_cliente');
    }
};
