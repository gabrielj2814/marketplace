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
        Schema::create('etiqueta_producto', function (Blueprint $table) {
            $table->uuid("ïd_etiqueta_producto")->primary();
            $table->char("id_producto",36);
            $table->foreign("id_producto")->on("producto")->references("id_producto")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_etiqueta",36);
            $table->foreign("id_etiqueta")->on("etiqueta")->references("id_etiqueta")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etiqueta_producto');
    }
};
