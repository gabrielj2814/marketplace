<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class AdminModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        "id_persona",
        "email",
        "email_recuperacion_admin",
        "pin_admin",
        "token_admin",
        "clave",
        "status_admin",
    ];

    protected static function boot(){
        parent:: boot();
        static::creating(function ($model){
            $model->id_admin= (string) Str::orderedUuid();
        });
    }

    protected $table = "admin";
    protected $primaryKey = "id_admin";
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = "string";

}
