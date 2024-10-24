<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'idProfesor',
        'idUc'
    ];

    public function profesor()
    {
        return $this->belongsTo(Professor::class, 'idProfesor');
    }

    public function credito()
    {
        return $this->belongsTo(Credit::class, 'idUc');
    }
}
