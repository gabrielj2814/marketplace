<?php

namespace App\Services;

use App\Models\ClienteModel;

class ClienteServices {

    public function crear($data){
        return ClienteModel::create($data);
    }

}
