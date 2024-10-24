<?php

namespace App\Http\Controllers;

use App\Models\MateriasHora;
use App\Models\Professor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = MateriasHora::select('idProfesor')->distinct()->get();
        return view('horarios.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profesor = Professor::find($id);
        $materias = MateriasHora::where('idProfesor', '=', $id)
            ->orderBy('dias', 'asc') // Ordenar por día de la semana
            ->orderBy('hora_inicio', 'asc') // Luego por hora de inicio
            ->get();
        $horario_profesor = [];
        foreach ($materias as $materia) {
            $seccion = $materia->secciones->Nombre;
            $aula = $materia->aulas->Nombre;
            $dia = $materia->dias;
            $nombre_materia = $materia->creditos->Nombre_UC; // Suponiendo que tienes una relación en el modelo MateriasHora
            $hora = $materia->hora_inicio;

            if (!isset($horario_profesor[$dia])) {
                $horario_profesor[$dia] = [];
            }

            $horario_profesor[$dia][] = [$nombre_materia, $hora, $seccion, $aula];
        }
        $pdf = Pdf::loadView('horarios.horarios', compact('profesor', 'horario_profesor'));

        return $pdf->stream();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
