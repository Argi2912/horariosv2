@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Horarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Materia - Seccion</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-warning alert-dimissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <div class="badge badge-danger">{{ $error }}</div>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times</span>
                                    </button>
                                </div>
                            @endif
                            
                            {!! Form::open(array('route'=>'materiasseccion.store', 'method' =>'POST')) !!}
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="idSeccion">Seccion</label>
                                        {!! Form::select('idSeccion', $secciones->pluck('Nombre', 'id'), null, ['class' => 'form-control', 'name' => 'idSeccion']) !!}                                   
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="idAula">Aulas</label>
                                        {!! Form::select('idAula', $aulas->pluck('Nombre', 'id'), null, ['class' => 'form-control', 'name' => 'idAula']) !!}                                   
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="idMateria">Materia</label>
                                        {!! Form::select('idMateria', $materias->pluck('Nombre_UC', 'id'), null, ['class' => 'form-control', 'name' => 'idMateria']) !!}                                   
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="idProfesor">Profesor</label>
                                        {!! Form::select('idProfesor', $profesores->pluck('Nombre', 'id')->map(function($nombre, $id) use ($profesores) {
                                            $apellido = $profesores->where('id', $id)->pluck('Apellido')->first();
                                            return $nombre . ' ' . $apellido;
                                        }), null, ['class' => 'form-control', 'name' => 'idProfesor']) !!}                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-4 ">
                                    <div class="form-group">
                                        <label for="dias">Dias</label>
                                        {!! Form::select('dias', ['Lunes' => 'Lunes', 'Martes' => 'Martes', 'Miercoles' => 'Miercoles', 'Jueves' => 'Jueves', 'Viernes' => 'Viernes'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="hora_inicio">Hora de Inicio</label>
                                        {!! Form::input('time', 'hora_inicio', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="hora_fin">Hora de Finalizacion</label>
                                        {!! Form::input('time', 'hora_fin', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>

                                
                                
                                <div class="col-12">
                                   <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
