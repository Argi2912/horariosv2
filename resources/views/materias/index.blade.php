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
                                        <h3 class="text-center">UC en el Sistema</h3>
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
                                    <a href="{{ route('materias.create') }}" class="btn btn-warning">Nueva Materia</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tabla-materias" class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Especialidad</th>
                                    <th style="color: #fff">Trayecto</th>
                                    <th style="color: #fff">Estilo</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Cantidad</th>
                                    <th style="color: #fff">HTA</th>
                                    <th style="color: #fff">Modalidad</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($materias as $materia)
                                        <tr>
                                            <td style="display: none">{{ $materia->id }}</td>
                                            <td>{{ $materia->especialidad->Nombre }}</td>
                                            <td>
                                                @if ($materia->Trayecto == 1)
                                                    I
                                                @elseif($materia->Trayecto == 2)
                                                    II
                                                @elseif($materia->Trayecto == 3)
                                                    III
                                                @elseif($materia->Trayecto == 4)
                                                    IV
                                                @else
                                                    PIU
                                                @endif
                                            </td>
                                            <td>
                                                @if ($materia->Estilo == 0)
                                                    Anual
                                                @elseif($materia->Estilo == 1)
                                                    FASE I
                                                @else
                                                    FASE II
                                                @endif
                                            </td>
                                            <td>{{ $materia->Nombre_UC }}</td>
                                            <td>{{ $materia->Cantidad_UC }}</td>
                                            <td>{{ $materia->HTA }}</td>
                                            <td>
                                                @if ($materia->Modalidad == 1)
                                                    Presencial
                                                @elseif($materia->Modalidad == 2)
                                                    Online
                                                @endif
                                            </td>

                                            <td>
                                                @can('editar')
                                                    <a href="{{ route('materias.edit', $materia->id) }}"
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
