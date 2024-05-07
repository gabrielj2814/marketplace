<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PersonaModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "cedula",
        "nombre",
        "apellido",
        "fecha_nacimiento",
        "status_persona",
    ];

    protected static function boot(){
        parent:: boot();
        static::creating(function ($model){
            $model->id_persona= (string) Str::orderedUuid();
        });
    }

    protected $table = "persona";
    protected $primaryKey = "id_persona";
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = "string";

}
