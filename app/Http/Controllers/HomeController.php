<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

use App\Models\Consulta;
use App\Models\Credit;
use App\Models\Professor;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profesores = Professor::all();
        $aulas = Classroom::all();
        $materias = Credit::all();

        return view('home', compact('profesores','aulas', 'materias'));
    }
}
