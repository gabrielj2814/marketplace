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
        Schema::create('admin', function (Blueprint $table) {
            $table->uuid("id_admin")->primary();
            $table->char("id_persona",36);
            $table->foreign("id_persona")->on("persona")->references("id_persona")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("email",150)->unique();
            $table->string("email_recuperacion_admin",150)->unique();
            $table->char("pin_admin",5)->nullable();
            $table->text("token_admin")->nullable();
            $table->string("clave",255);
            $table->enum("status_admin",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_admin');
    }
};
