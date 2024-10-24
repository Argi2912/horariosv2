@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Aulas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Editar de Aula</h3>
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
                            {!! Form::model($aula, ['method' => 'PUT', 'route' => ['aulas.update', $aula->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Nombre">Nombre</label>
                                        {!! Form::text('Nombre', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="Hora_inicio">Hora de Inicio</label>
                                        {!! Form::input('time', 'Hora_inicio', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="Hora_fin">Hora de Finalizacion</label>
                                        {!! Form::input('time', 'Hora_fin', null, array('class' =>'form-control')) !!}
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
