<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriasHora extends Model
{
    use HasFactory;

    protected $fillable = [
        'idProfesor',
        'idMateria',
        'idSeccion',
        'idAula',
        'dias',
        'hora_inicio',
        'hora_fin'
    ];

    public function creditos()
    {
        return $this->belongsTo(Credit::class, 'idMateria');

    }

    public function profesor()
    {
        return $this->belongsTo(Professor::class, 'idProfesor');
    }

    public function secciones()
    {
        return $this->belongsTo(Section::class, 'idSeccion');
    }
    public function aulas()
    {
        return $this->belongsTo(Classroom::class, 'idAula');
    }
}
