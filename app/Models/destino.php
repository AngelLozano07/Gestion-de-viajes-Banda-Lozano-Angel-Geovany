<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class destino extends Model
{
    //
    use SoftDeletes;

    protected $casts = [
        'imagenes' => 'array',
    ];
    protected $fillable = [
        'nombre',
        'ciudad',
        'pais',
        'direccion',
        'imagenes',
    ];

    protected $table = 'destinos';
}
