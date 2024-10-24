<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Pcredit;
use App\Models\Professor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditsP = Pcredit::select('idProfesor')->distinct()->get();
        return view('materiasp.index', compact('creditsP'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Professor::all();
        $creditos = Credit::all();
        return view('materiasp.crear', compact('profesores', 'creditos'));
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
            'idUc' => 'required'
        ]);

        $ucIds = $request->input('idUc');
        $idProfesor = $request->input('idProfesor');

        foreach ($ucIds as $ucId) {
            $mxp = new Pcredit();
            $mxp->idProfesor = $idProfesor;
            $mxp->idUc = $ucId;
            $mxp->save();
        }


        return redirect()->route('materiasp.index');
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
        $creditos = Pcredit::where('idProfesor', '=', $profesor->id)->get();
        $pdf = Pdf::loadView('materiasp.pdf', compact( 'profesor', 'creditos'));
        
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pcredit $materiasprofesor)
    {
        $materias = Credit::find($materiasprofesor->idUc);
        $pdf = Pdf::loadView('materiasprofesor.pdf', compact('materias'));
        
        return $pdf->stream();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pcredit $materiasprofesor)
    {
        $this->validate($request, [
            'idProfesor' => 'required',
            'idUc' => 'required'
        ]);

        $ucIds = $request->input('idUc');
        $profesor = Professor::find($materiasprofesor->idProfesor);

        foreach ($ucIds as $ucId) {
            $materiasprofesor->idProfesor = $profesor->id; // Actualiza el id del profesor
            $materiasprofesor->idUc = $ucId; // Actualiza el id de la materia
            $materiasprofesor->save(); // Guarda los cambios en el nuevo modelo
        }

        return redirect()->route('materiasprofesor.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pcredit $materiasprofesor)
    {
        $materiasprofesor->delete();
        return redirect()->route('materiasprofesor.index');

    }
}
