<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abeja extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'empresa_id',
        'tipo_contrato',
        'user_id',
        'fecha_postura',
        'sector_polinizacion',
        'tipo_colmena',
        'cantidad_colmenas',
        'cultivo',
        'observaciones',
        'responsable_entrega'
      ];

      protected $dates = ['deleted_at', 'fecha_postura'];

      public function Empresa()
      {
        return $this->hasOne('App\Empresa', 'id', 'empresa_id');
      }

      public function Encargado()
      {
        return $this->hasOne('App\User', 'id', 'user_id');
      }
}
