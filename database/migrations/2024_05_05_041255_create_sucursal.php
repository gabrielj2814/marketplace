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
        Schema::create('sucursal', function (Blueprint $table) {
            $table->uuid("id_sucursal")->primary();
            $table->char("id_tienda",36);
            $table->foreign("id_tienda")->on("tienda")->references("id_tienda")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_pais",36);
            $table->foreign("id_pais")->on("pais")->references("id_pais")->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('sucursal');
    }
};
