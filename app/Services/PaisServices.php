<?php

namespace App\Services;

use App\Models\PaisModel;

class PaisServices {

    public function crear($data){
        return PaisModel::create($data);
    }

}
