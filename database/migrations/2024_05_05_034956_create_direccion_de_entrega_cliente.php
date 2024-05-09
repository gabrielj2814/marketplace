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
        Schema::create('direccion_de_entrega_cliente', function (Blueprint $table) {
            $table->uuid("id_direccion_de_entrega_cliente")->primary();
            $table->char("id_cliente",36);
            $table->foreign("id_cliente")->on("cliente")->references("id_cliente")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("codigo_postal",10);
            $table->decimal("cordenada_lat",11,8);
            $table->decimal("cordenada_lng",11,8);
            $table->text("direccion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccion_de_entrega_cliente');
    }
};
