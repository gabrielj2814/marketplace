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
        Schema::create('archivo', function (Blueprint $table) {
            $table->uuid("id_archivo")->primary();
            $table->char("id_tienda",36);
            $table->foreign("id_tienda")->on("tienda")->references("id_tienda")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("nombre_archivo",255);
            $table->string("nombre_uuid_archivo",255);
            $table->string("extencion",5);
            $table->text("url");
            $table->enum("status_archivo",["ACTIVO","INACTIVO"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivo');
    }
};
