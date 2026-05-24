<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hospedaje extends Model
{
    //
    use SoftDeletes;

    protected $casts = [
        'imagenes' => 'array',
    ];
    protected $fillable = [
        'nombre',
        'capacidad',
        'tipo',
        'direccion',
        'imagenes',
    ];

    protected $table = 'hospedajes';
}
