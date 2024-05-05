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
        Schema::create('verificacion_2_pasos_pin', function (Blueprint $table) {
            $table->uuid("id_verificacion_2_pasos_pin")->primary();
            $table->string("email",150);
            $table->string("pin",5);
            $table->char("id_propietario_pin",36);
            $table->string("modelo",150);
            $table->time("tiempo_vecimiento");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificacion_2_pasos_pin');
    }
};
