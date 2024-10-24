<?php

namespace App\Http\Controllers;

use App\Models\HorarioSeccion;
use App\Models\MateriasHora;
use App\Models\Section;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class HorarioSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secciones = Section::all();
        return view('horarioss.index', compact('secciones'));
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
        $seccion = Section::find($id);
        $materias = MateriasHora::where('idSeccion', '=', $id)
            ->orderBy('dias', 'asc') // Ordenar por día de la semana
            ->orderBy('hora_inicio', 'asc') // Luego por hora de inicio
            ->get();
        $horario_profesor = [];
        foreach ($materias as $materia) {
            
            $dia = $materia->dias;
            $nombre_materia = $materia->creditos->Nombre_UC; // Suponiendo que tienes una relación en el modelo MateriasHora
            $hora = $materia->hora_inicio;

            if (!isset($horario_profesor[$dia])) {
                $horario_profesor[$dia] = [];
            }

            $horario_profesor[$dia][] = [$nombre_materia, $hora];
        }

        $datosP = [];
        foreach ($materias as $materia) {
            $profesor = $materia->profesor->Nombre.' '.$materia->profesor->Apellido; // Suponiendo que tienes una relación en el modelo MateriasHora
            $Telefono = $materia->profesor->Telefono; // Suponiendo que tienes una relación en el modelo MateriasHora
            $Email = $materia->profesor->Email; // Suponiendo que tienes una relación en el modelo MateriasHora
            $materia = $materia->creditos->Nombre_UC; // Suponiendo que tienes una relación en el modelo MateriasHora

            $datosP[] = [$profesor, $Telefono, $Email, $materia];

        }


        $pdf = Pdf::loadView('horarioss.horarios', compact('seccion', 'horario_profesor', 'datosP'));

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
