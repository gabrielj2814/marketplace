<?php

namespace App\Services;

use App\Models\TiendaModel;

class TiendaServices {


    public function crear($data){
        return TiendaModel::create($data);
    }



}
