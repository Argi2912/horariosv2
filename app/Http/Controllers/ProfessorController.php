<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Professor::all();
        return view('profesores.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesores.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Email' => 'required',
            'Telefono' => 'required',

        ]);

        $profesores = Professor::create($request->all());

        return redirect()->route('profesores.index')->with('success', '¡Se ha registrado exitosamente!');

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
    public function edit(Professor $profesore)
    {
        return view('profesores.editar', compact('profesore'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $profesore)
    {
        $this->validate($request,[
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Email' => 'required',
            'Telefono' => 'required',

        ]);

        $profesore->update($request->all());

        return redirect()->route('profesores.index')->with('success', '¡Se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $profesore)
    {
        $profesore->delete();
        return redirect()->route('profesores.index')->with('success', '¡El registro se ha Eliminado exitosamente!');;

    }
}
