<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Specialty;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Credit::all();
        return view('materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidad = Specialty::all();
        return view('materias.crear', compact('especialidad'));
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
            'idEspecialidad' => 'required',
            'Trayecto' => 'required',
            'Estilo' => 'required',
            'Nombre_UC' => 'required',
            'Cantidad_UC' => 'required',
            'HTA' => 'required',
            'Modalidad' => 'required',

        ]);

        $profesores = Credit::create($request->all());

        return redirect()->route('materias.index')->with('success', '¡El registro se ha guardado exitosamente!');
    
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
    public function edit(Credit $materia)
    {
        $especialidad = Specialty::all();
        return view('materias.editar', compact('materia','especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $materia)
    {
        $this->validate($request, [
            'idEspecialidad' => 'required',
            'Trayecto' => 'required',
            'Estilo' => 'required',
            'Nombre_UC' => 'required',
            'Cantidad_UC' => 'required',
            'HTA' => 'required',
            'Modalidad' => 'required',

        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', '¡El registro se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', '¡El registro se ha eliminado exitosamente!');

    }
}
