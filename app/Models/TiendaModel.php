<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class TiendaModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "nombre_tienda",
        "email",
        "email_recuperacion_tienda",
        "pin_tienda",
        "token_tienda",
        "clave",
        "status_tienda",
    ];

    protected static function boot(){
        parent:: boot();
        static::creating(function ($model){
            $model->id_tienda= (string) Str::orderedUuid();
        });
    }

    protected $table = "tienda";
    protected $primaryKey = "id_tienda";
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = "string";
}
