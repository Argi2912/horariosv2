@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Secciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Secciones en el Sistema</h3>
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
                                    <a href="{{ route('secciones.create') }}" class="btn btn-warning">Nueva Seccion</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tabla-aulas" class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($secciones as $seccion)
                                        <tr>
                                            <td style="display: none">{{ $seccion->id }}</td>
                                            <td>{{ $seccion->Nombre }}</td>
                                            <td>
                                                @can('editar')
                                                    <a href="{{ route('secciones.edit', $seccion->id) }}"
                                                        class="btn btn-info">Editar</a>
                                                @endcan
                                                @can('borrar')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['secciones.destroy', $seccion->id], 'style' => 'display:inline']) !!}
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
            $('#tabla-usuarios').DataTable();

            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endpush
