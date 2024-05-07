<?php

namespace Database\Seeders;

use App\Services\AdminServices;
use App\Services\PersonaServices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatosInicialesSistemaSeeder extends Seeder
{
    function __construct(
        protected PersonaServices $PersonaServices,
        protected AdminServices $AdminServices,
    ){}
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datosPeronsa=[
            "cedula" => "00000000",
            "nombre" => "root",
            "apellido" => "root",
            "fecha_nacimiento" => "1998-02-28",
            "status_persona" => "ACTIVO",
        ];

        $persona=$this->PersonaServices->craer($datosPeronsa);

        $datosAdmin=[
            "id_persona" => $persona->id_persona,
            "email" => env("CORREO_ADMIN_SISTEMA"),
            "email_recuperacion_admin" => env("CORREO_ADMIN_SISTEMA"),
            "pin_admin" => NULL,
            "token_admin" => NULL,
            "clave" => Hash::make(env("CLAVE_ADMIN_SISTEMA")),
            "status_admin" => "ACTIVO",
        ];

        $admin=$this->AdminServices->craer($datosAdmin);






    }
}
