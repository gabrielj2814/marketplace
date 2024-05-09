<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PaisModel extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre_pais",
        "status_pais",
    ];

    protected static function boot(){
        parent:: boot();
        static::creating(function ($model){
            $model->id_pais= (string) Str::orderedUuid();
        });
    }

    protected $table = "pais";
    protected $primaryKey = "id_pais";
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = "string";
}
