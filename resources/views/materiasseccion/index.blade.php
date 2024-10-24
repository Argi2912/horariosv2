@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Unidades de Credito</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Materia por Seccion</h3>
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
                                    <a href="{{ route('materiasseccion.create') }}" class="btn btn-warning">Ingresar</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tabla-materias" class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Seccion</th>
                                    <th style="color: #fff">Aula</th>
                                    <th style="color: #fff">Materia</th>
                                    <th style="color: #fff">Dia</th>
                                    <th style="color: #fff">Hora Inicio</th>
                                    <th style="color: #fff">Hora Fin</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($materias as $materia)
                                        <tr>
                                            <td style="display: none">{{ $materia->id }}</td>
                                            <td>{{ $materia->creditos->Nombre_UC }}</td>
                                            <td>{{ $materia->secciones->Nombre }}</td>
                                            <td>{{ $materia->aulas->Nombre }}</td>
                                            <td>{{ $materia->dias }}</td>
                                            <td>{{ $materia->hora_inicio }}</td>
                                            <td>{{ $materia->hora_fin }}</td>
                                            <td>
                                                @can('editar')
                                                    <a href="{{ route('materiasseccion.edit', $materia->id) }}"
                                                        class="btn btn-info">Editar</a>
                                                @endcan
                                                @can('borrar')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['materias.destroy', $materia->id],
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
            $('#tabla-materias').DataTable();

            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endpush
