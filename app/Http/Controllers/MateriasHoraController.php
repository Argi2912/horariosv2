<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Credit;
use App\Models\MateriasHora;
use App\Models\Professor;
use App\Models\Section;
use Illuminate\Http\Request;

class MateriasHoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = MateriasHora::all();

        return view('horasmateria.index', compact('materias'));
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

        return view('horasmateria.crear', compact('materias', 'profesores', 'aulas', 'secciones'));
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
            'idProfesor' => 'required',
            'idMateria' => 'required',
            'idSeccion' => 'required',
            'idAula' => 'required',
            'dias' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required'
        ]);

        // Verificar si el profesor ya tiene una materia asignada para el mismo día y dentro del rango de horas
        $existingHorario = MateriasHora::where('idProfesor', $request->idProfesor)
            ->where('dias', $request->dias)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_fin)
                        ->where('hora_fin', '>', $request->hora_inicio);
                })->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '>', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                });
            })
            ->exists();

        $existingAula = MateriasHora::where('idAula', $request->idAula)
            ->where('dias', $request->dias)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_fin)
                        ->where('hora_fin', '>', $request->hora_inicio);
                })->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '>', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                });
            })
            ->exists();

        if ($existingHorario) {
            return redirect()->route('horasmateria.index')->with('error', 'El profesor ya tiene una materia asignada para ese día y rango de horas.');
        } elseif ($existingAula) {
            return redirect()->route('horasmateria.index')->with('error', 'El aula ya tiene una materia asignada para ese día y rango de horas.');
        }
        // Si no existe un horario con esas condiciones, crear un nuevo registro
        $secciones = MateriasHora::create($request->all());
        $horarios = MateriasHora::create($request->all());

        return redirect()->route('horasmateria.index')->with('success', '¡Se ha registrado exitosamente!');
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
    public function edit(MateriasHora $horasmaterium)
    {
        $materias = Credit::all();
        $profesores = Professor::all();
        $aulas = Classroom::all();
        $secciones = Section::all();

        return view('horasmateria.editar', compact('horasmaterium', 'materias', 'profesores', 'aulas', 'secciones'))->with('success', '¡Se ha actualizado exitosamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MateriasHora $horasmaterium)
    {
        $this->validate($request, [
            'idProfesor' => 'required',
            'idMateria' => 'required',
            'idSeccion' => 'required',
            'idAula' => 'required',
            'dias' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required'
        ]);

        $existingHorario = MateriasHora::where('idProfesor', $request->idProfesor)
            ->where('dias', $request->dias)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_fin)
                        ->where('hora_fin', '>', $request->hora_inicio);
                })->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '>', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                });
            })
            ->exists();

        $existingAula = MateriasHora::where('idAula', $request->idAula)
            ->where('dias', $request->dias)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_fin)
                        ->where('hora_fin', '>', $request->hora_inicio);
                })->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '>', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                });
            })
            ->exists();

        if ($existingHorario) {
            return redirect()->route('horasmateria.index')->with('error', 'El profesor ya tiene una materia asignada para ese día y rango de horas.');
        } elseif ($existingAula) {
            return redirect()->route('horasmateria.index')->with('error', 'El aula ya tiene una materia asignada para ese día y rango de horas.');
        }

        $horasmaterium->update($request->all());

        return redirect()->route('horasmateria.index')->with('success', '¡Se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MateriasHora $horasmaterium)
    {
        $horasmaterium->delete();
        return redirect()->route('horasmateria.index')->with('success', '¡Se ha eliminado exitosamente!');
    }
}
