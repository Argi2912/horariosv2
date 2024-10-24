<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Credit;
use App\Models\HorarioSeccion;
use App\Models\Professor;
use App\Models\Section;
use Illuminate\Http\Request;

class MateriasSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = HorarioSeccion::all(); 

        return view('materiasseccion.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Credit::all();
        $profesores = Professor::all();
        $aulas = Classroom::all();
        $secciones = Section::all();

        return view('materiasseccion.crear', compact('materias', 'profesores','aulas', 'secciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'idProfesor',
            'idMateria',
            'idAula',
            'idSeccion',
            'hora_inicio',
            'hora_fin'
        ]);

        $horarios = HorarioSeccion::create($request->all());

        return redirect()->route('materiasseccion.index')->with('success', '¡Se ha registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HorarioSeccion $materiasseccion)
    {
        $materias = Credit::all();
        $profesores = Professor::all();
        $aulas = Classroom::all();
        $secciones = Section::all();    

        return view('materiasseccion.editar', compact( 'materiasseccion','materias', 'profesores','aulas', 'secciones'))->with('success', '¡Se ha actualizado exitosamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HorarioSeccion $materiasseccion)
    {
        $this->validate($request, [
            'idProfesor',
            'idMateria',
            'idAula',
            'idSeccion',
            'hora_inicio',
            'hora_fin'
        ]);

        $materiasseccion->update($request->all());

        return redirect()->route('materiasseccion.index')->with('success', '¡Se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HorarioSeccion $materiasseccion)
    {
        $materiasseccion->delete();
        return redirect()->route('horasmateria.index')->with('success', '¡Se ha eliminado exitosamente!');
    }
}
