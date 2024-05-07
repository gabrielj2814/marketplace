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
        Schema::create('tienda', function (Blueprint $table) {
            $table->uuid("id_tienda")->primary();
            $table->string("nombre_tienda",150);
            $table->string("email",150)->unique();
            $table->string("email_recuperacion_admin",150)->unique();
            $table->char("pin_tienda",5)->nullable();
            $table->text("token_tienda")->nullable();
            $table->string("clave",255);
            $table->enum("status_tienda",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tienda');
    }
};
