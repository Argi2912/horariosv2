<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aulas = Classroom::all();
        return view('aulas.index', compact('aulas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aulas.crear');

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
            'Nombre' => 'required',
            'Hora_inicio' => 'required',
            'Hora_fin' => 'required',
        ]);

        $aulas = Classroom::create($request->all());

        return redirect()->route('aulas.index')->with('success', '¡El registro se ha registrado exitosamente!');

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
    public function edit(Classroom $aula)
    {
        return view('aulas.editar', compact('aula'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $aula)
    {
        $this->validate($request, [
            'Nombre' => 'required',
            'Hora_inicio' => 'required',
            'Hora_fin' => 'required',
        ]);

        $aula->update($request->all());

        return redirect()->route('aulas.index')->with('success', '¡El registro se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', '¡El registro se ha eliminado exitosamente!');

    }
}
