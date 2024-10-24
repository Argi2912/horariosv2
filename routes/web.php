<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CreditController;
use Illuminate\Support\Facades\Route;
//Controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\HorarioSeccionController;
use App\Http\Controllers\MateriasHoraController;
use App\Http\Controllers\MateriasSeccionController;
use App\Http\Controllers\PCreditController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function (){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('profesores', ProfessorController::class);
    Route::resource('especialidades', SpecialtyController::class);
    Route::resource('aulas', ClassroomController::class);
    Route::resource('materias', CreditController::class);
    Route::resource('materiasprofesor', PCreditController::class);
    Route::resource('horasmateria', MateriasHoraController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('secciones', SectionController::class);
    Route::resource('horarioss',HorarioSeccionController::class);
    Route::resource('materiasseccion', MateriasSeccionController::class);
    //Route::get('materiasprofesor/pdf/{id}', [PCreditController::class, 'pdf'])->name('horarios.pdf');
   });