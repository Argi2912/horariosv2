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
                                        <h3 class="text-center">Profesores con Materias en el Sistema</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row ml-3">
                                <div class="col-md-6">
                                    <a href="{{ route('materiasprofesor.create') }}" class="btn btn-warning">Ingresar</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tabla-creditP" class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Profesor</th>
                                    <th style="color: #fff">Acciones</th>

                                </thead>
                                <tbody>
                                    @foreach ($creditsP as $creditP)
                                        <tr>
                                            <td style="display: none">{{ $creditP->id }}</td>
                                            @foreach ($creditsP as $credit)
                                            <td>{{ $creditP->profesor->Nombre . ' ' . $creditP->profesor->Apellido }}</td>
                                            @endforeach

                                            <td>
                                                @can('editar-rol')
                                                    <a href="{{ route('materiasprofesor.show', $creditP->profesor->id) }}"
                                                        class="btn btn-success" target="_blank" rel="noopener">Imprimir</a>
                                                        
                                                @endcan

                                                @can('borrar-rol')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['materiasprofesor.destroy', $creditP->profesor->id],
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
            $('#tabla-creditP').DataTable();
        });
    </script>
@endpush
