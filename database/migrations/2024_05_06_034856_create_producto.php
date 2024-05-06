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
        Schema::create('producto', function (Blueprint $table) {
            $table->uuid("id_producto")->primary();
            $table->char("id_tienda",36);
            $table->foreign("id_tienda")->on("tienda")->references("id_tienda")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_empresa",36);
            $table->foreign("id_empresa")->on("empresa")->references("id_empresa")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("nombre_producto");
            $table->enum("status_producto",["ACTIVO","INACTIVO"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
