@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Profesores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Profesores en el Sistema</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible" id="success-alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row ml-3">
                                <div class="col-md-6">
                                    <a href="{{ route('profesores.create') }}" class="btn btn-warning">Nuevo Profesor</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tabla-profesores" class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Apellido</th>
                                    <th style="color: #fff">Email</th>
                                    <th style="color: #fff">Telefono</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($profesores as $profesor)
                                        <tr>
                                            <td style="display: none">{{ $profesor->id }}</td>
                                            <td>{{ $profesor->Nombre }}</td>
                                            <td>{{ $profesor->Apellido }}</td>
                                            <td>{{ $profesor->Email }}</td>
                                            <td>{{ $profesor->Telefono }}</td>

                                            <td>
                                                @can('editar-rol')
                                                    <a href="{{ route('profesores.edit', $profesor->id) }}"
                                                        class="btn btn-info">Editar</a>
                                                @endcan
                                                @can('borrar-rol')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['profesores.destroy', $profesor->id],
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {{-- {!! $aulas->links() !!} --}}
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
            $('#tabla-profesores').DataTable();

            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endpush
