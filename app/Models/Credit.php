<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'idEspecialidad',
        'Trayecto',
        'Estilo',
        'Nombre_UC',
        'Cantidad_UC',
        'HTA',
        'Modalidad'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Specialty::class, 'idEspecialidad');
    }
}
