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
                                        <h3 class="text-center">Usuarios en el Sistema</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3">
                                <div class="col-md-6">
                                    <a href="{{ route('usuarios.create') }}" class="btn btn-warning">Nuevo Usuario</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tabla-usuarios" class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">E-mail</th>
                                    <th style="color: #fff">Rol</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td style="display: none">{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                @if (!empty($usuario->getRoleNames()))
                                                    @foreach ($usuario->getRoleNames() as $rolName)
                                                        <h5><spam class="badge badge-primary">{{ $rolName }}</spam></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @can('editar-rol')
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-info">Editar</a>
                                                @endcan
                                                @can('borrar-rol')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {{-- {!! $usuarios->links() !!} --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#tabla-usuarios').DataTable();
    });
</script>
@endpush