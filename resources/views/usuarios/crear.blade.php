@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Alta de Usuarios</h3>
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
                            
                            {!! Form::open(array('route'=>'usuarios.store', 'method' =>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        {!! Form::text('email', null, array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        {!! Form::password('password', array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar Contraseña</label>
                                        {!! Form::password('confirm-password', array('class' =>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="roles">Roles</label>
                                        {!! Form::select('roles[]', $roles,[], array('class' =>'form-control')) !!}
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
