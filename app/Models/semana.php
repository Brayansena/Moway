<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class semana extends Model
{
    use HasFactory;

    protected $fillable = [
        'Hora_inicio_semana',
        'Hora_final_semana'
    ];
}
