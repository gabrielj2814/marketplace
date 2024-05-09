<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ClienteModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "id_pais",
        "id_persona",
        "email_recuperacion_cliente",
        "pin_cliente",
        "token_cliente",
        "clave",
        "status_cliente",
    ];

    protected static function boot(){
        parent:: boot();
        static::creating(function ($model){
            $model->id_cliente= (string) Str::orderedUuid();
        });
    }

    protected $table = "cliente";
    protected $primaryKey = "id_cliente";
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = "string";
}
