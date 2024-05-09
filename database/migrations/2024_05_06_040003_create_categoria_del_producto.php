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
        Schema::create('categoria_del_producto', function (Blueprint $table) {
            $table->uuid("id_categoria_del_producto")->primary();
            $table->char("id_producto",36);
            $table->foreign("id_producto")->on("producto")->references("id_producto")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_categoria_producto",36);
            $table->foreign("id_categoria_producto")->on("categoria_producto")->references("id_categoria_producto")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_del_producto');
    }
};
