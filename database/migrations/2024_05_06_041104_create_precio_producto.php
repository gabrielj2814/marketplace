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
        Schema::create('precio_producto', function (Blueprint $table) {
            $table->uuid("id_precio_producto")->primary();
            $table->double("precio",20,2);
            $table->integer("descuento")->nullable();
            $table->date("fecha_vencimiento_descuento")->nullable();
            $table->char("id_sucursal",36);
            $table->foreign("id_sucursal")->on("sucursal")->references("id_sucursal")->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum("status_precio_producto",["ACTIVO","INACTIVO"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precio_producto');
    }
};
