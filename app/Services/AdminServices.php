<?php

namespace App\Services;

use App\Models\AdminModel;

class AdminServices {

    function craer($data){
        return AdminModel::create($data);
    }

}
