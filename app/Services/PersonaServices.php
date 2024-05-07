<?php

namespace App\Services;

use App\Models\PersonaModel;

class PersonaServices {


    function craer($data){
        return PersonaModel::create($data);
    }



}
