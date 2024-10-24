@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Creditos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Asignar Materias al Profesores</h3>
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
                            {!! Form::model($materiasprofesor, ['method' => 'PUT', 'route' => ['materiasprofesor.update',$profesor->id]]) !!}                                                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="idProfesor">Profesor</label>
                                        {!! Form::select('idProfesor', $profesor->pluck('Nombre', 'id'), null, ['class' => 'form-control', 'name' => 'idProfesor', 'disabled' => 'disabled']) !!}                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Materias</label>
                                        <br>
                                        <div class="row">
                                            @foreach ($creditos as $value)
                                                <div class="col-md-4">
                                                    <label>
                                                        {!! Form::checkbox('idUc[]', $value->id, in_array($value->id, $seleccionadas), ['class' => 'name']) !!}
                                                        {{ $value->Nombre_UC }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
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
