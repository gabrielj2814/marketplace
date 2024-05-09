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
        Schema::create('factura', function (Blueprint $table) {
            $table->uuid("id_factura")->primary();
            $table->char("id_sucursal",36);
            $table->foreign("id_sucursal")->on("sucursal")->references("id_sucursal")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_cliente",36);
            $table->foreign("id_cliente")->on("cliente")->references("id_cliente")->cascadeOnDelete()->cascadeOnUpdate();
            $table->date("fecha_factura");
            $table->double("sub_total",20,2);
            $table->double("iva",20,2);
            $table->char("id_direccion_de_entrega_cliente",36);
            $table->foreign("id_direccion_de_entrega_cliente")->on("direccion_de_entrega_cliente")->references("id_direccion_de_entrega_cliente")->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum("status_factura",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
