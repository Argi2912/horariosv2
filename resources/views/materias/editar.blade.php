@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Materias</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Alta de Materias</h3>
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
                            {!! Form::model($materia, ['method' => 'PUT', 'route' => ['materias.update',$materia->id]]) !!}                            

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="idEspecialidad">Especialidad</label>
                                        {!! Form::select('idEspecialidad', $especialidad->pluck('Nombre', 'id'), null, ['class' => 'form-control', 'name' => 'idEspecialidad']) !!}                                   
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Trayecto">Trayecto</label>
                                        {!! Form::select('Trayecto', ['0' => 'PIU', '1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Estilo">Estilo</label>
                                        {!! Form::select('Estilo', ['0' => 'Anual', '1' => 'FASE I', '2' => 'FASE II'], null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Nombre_UC">Nombre</label>
                                        {!! Form::text('Nombre_UC', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="Cantidad_UC">Cantidad de UC</label>
                                        {!! Form::number('Cantidad_UC', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="HTA">HTA</label>
                                        {!! Form::number('HTA', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="Modalidad">Modalidad</label>
                                        {!! Form::select('Modalidad', ['1' => 'Presencial', '2' => 'Online'], null, ['class' => 'form-control']) !!}
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
