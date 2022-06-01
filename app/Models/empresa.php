<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit_empresa',
        'nombre_empresa',
        'direccion_empresa'
    ];
}
