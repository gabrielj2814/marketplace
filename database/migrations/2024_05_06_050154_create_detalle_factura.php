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
        Schema::create('detalle_factura', function (Blueprint $table) {
            $table->uuid("id_detalle_factura")->primary();
            $table->char("id_precio_producto",36);
            $table->foreign("id_precio_producto")->on("precio_producto")->references("id_precio_producto")->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer("iva_porcentaje");
            $table->double("iva",20,2);
            $table->double("precio_final",20,2);
            $table->double("precio_descuento",20,2);
            $table->enum("tiene_descuento",["SI","NO"]);
            $table->double("precio_original",20,2);
            $table->double("sub_total_final",20,2);
            $table->integer("cantidad");
            $table->enum("status_detalle_factura",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_factura');
    }
};
