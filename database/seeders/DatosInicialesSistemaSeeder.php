<?php

namespace Database\Seeders;

use App\Services\AdminServices;
use App\Services\ClienteServices;
use App\Services\PaisServices;
use App\Services\PersonaServices;
use App\Services\TiendaServices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatosInicialesSistemaSeeder extends Seeder
{
    function __construct(
        private PersonaServices $PersonaServices,
        private AdminServices $AdminServices,
        private TiendaServices $TiendaServices,
        private ClienteServices $ClienteServices,
        private PaisServices $PaisServices,
    ){}
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datosPeronsaAdmin=[
            "cedula" => "00000000",
            "nombre" => "root",
            "apellido" => "root",
            "fecha_nacimiento" => "1998-02-28",
            "status_persona" => "ACTIVO",
        ];

        $personaAdmin=$this->PersonaServices->craer($datosPeronsaAdmin);

        $datosAdmin=[
            "id_persona" => $personaAdmin->id_persona,
            "email" => env("CORREO_ADMIN_SISTEMA"),
            "email_recuperacion_admin" => env("CORREO_ADMIN_SISTEMA"),
            "pin_admin" => NULL,
            "token_admin" => NULL,
            "clave" => Hash::make(env("CLAVE_ADMIN_SISTEMA")),
            "status_admin" => "ACTIVO",
        ];

        $admin=$this->AdminServices->craer($datosAdmin);

        $datosTienda=[
            "nombre_tienda" => "Tienda Test",
            "email" => env("CORREO_TIENDA_SISTEMA"),
            "email_recuperacion_tienda" => env("CORREO_TIENDA_SISTEMA"),
            "pin_tienda" => NULL,
            "token_tienda" => NULL,
            "clave" => Hash::make(env("CLAVE_TIENDA_SISTEMA")),
            "status_tienda" => "ACTIVO",
        ];

        $tienda=$this->TiendaServices->crear($datosTienda);


        $datosPais=[
            "nombre_pais" => "Venezuela",
            "status_pais" => "ACTIVO",
        ];

        $pais=$this->PaisServices->crear($datosPais);

        $datosPeronsaCliente=[
            "cedula" => "11111111",
            "nombre" => "cliente",
            "apellido" => "cliente",
            "fecha_nacimiento" => "1998-02-28",
            "status_persona" => "ACTIVO",
        ];

        $personaClient=$this->PersonaServices->craer($datosPeronsaCliente);

        $dataCliente=[
            "id_pais" => $pais->id_pais,
            "id_persona" => $personaClient->id_persona,
            "email" => env("CORREO_CLIENTE_SISTEMA"),
            "email_recuperacion_cliente" => env("CORREO_CLIENTE_SISTEMA"),
            "pin_cliente" => NULL,
            "token_cliente" => NULL,
            "clave" => Hash::make(env("CLAVE_CLIENTE_SISTEMA")),
            "status_cliente" => "ACTIVO",
        ];

        $cliente=$this->ClienteServices->crear($dataCliente);

    }
}
