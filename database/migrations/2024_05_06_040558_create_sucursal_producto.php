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
        Schema::create('sucursal_producto', function (Blueprint $table) {
            $table->uuid("id_sucursal_producto")->primary();
            $table->char("id_producto",36);
            $table->foreign("id_producto")->on("producto")->references("id_producto")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_sucursal",36);
            $table->foreign("id_sucursal")->on("sucursal")->references("id_sucursal")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_tienda",36);
            $table->foreign("id_tienda")->on("tienda")->references("id_tienda")->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer("stock")->nullable();
            $table->string("moneda",10)->nullable();
            $table->enum("status_sucursal_producto",["ACTIVO","INACTIVO"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursal_producto');
    }
};
