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
        Schema::create('cliente', function (Blueprint $table) {
            $table->uuid("id_cliente")->primary();
            $table->char("id_pais",36);
            $table->foreign("id_pais")->on("pais")->references("id_pais")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_persona",36);
            $table->foreign("id_persona")->on("persona")->references("id_persona")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("email",150)->unique();
            $table->string("email_recuperacion_cliente",150)->unique();
            $table->char("pin_cliente",5)->nullable();
            $table->text("token_cliente")->nullable();
            $table->string("clave",255);
            $table->enum("status_cliente",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
