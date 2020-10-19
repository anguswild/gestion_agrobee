<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{

  use SoftDeletes;

  protected $date = ['deleted_at'];

  protected $fillable = [
    'nombre', 'rut', 'direccion', 'giro'
  ];
}
