@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Listado de roles</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3">
                                @can('crear-rol')
                                    <div class="col-md-6">
                                        <a href="{{ route('roles.create') }}" class="btn btn-warning">Nuevo Rol</a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="color: #fff">Rol</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $rol)
                                        <tr>
                                           
                                            <td>{{ $rol->name }}</td>
                                            <td>
                                                @can('editar-rol')
                                                <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-info">Editar</a>
                                                @endcan

                                                @can('borrar-rol')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $rol->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                                
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
