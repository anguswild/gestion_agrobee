<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aplicacion extends Model
{

    use SoftDeletes;

    protected $table = 'aplicaciones';


    protected $fillable = [
        'empresa_id',
        'user_id',
        'fecha_aplicacion',
        'tipo_maquinaria',
        'nombre_producto',
        'dosis',
        'cantidad_agua',
        'cantidad_hectareas'
    ];

    protected $dates = ['deleted_at', 'fecha_aplicacion'];

    public function Empresa()
    {
        return $this->hasOne('App\Empresa', 'id', 'empresa_id');
    }

    public function Encargado()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
