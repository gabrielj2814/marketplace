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
        Schema::create('permiso_admin', function (Blueprint $table) {
            $table->uuid("id_permiso_admin")->primary();
            $table->char("id_admin",36);
            $table->foreign("id_admin")->on("admin")->references("id_admin")->cascadeOnDelete()->cascadeOnUpdate();
            $table->char("id_permisos_modulo",36);
            $table->foreign("id_permisos_modulo")->on("permisos_modulo")->references("id_permisos_modulo")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permiso_admin');
    }
};
