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
        Schema::create('pregunta_seguridad', function (Blueprint $table) {
            $table->uuid("id_pregunta_seguridad")->primary();
            $table->string("pregunta",255);
            $table->enum("status_pregunta_seguridad",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregunta_seguridad');
    }
};
