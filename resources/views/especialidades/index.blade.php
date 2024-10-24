@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Especialidades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-tittle">
                                        <h3 class="text-center">Especialidades en el Sistema</h3>
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
                                    <a href="{{ route('especialidades.create') }}" class="btn btn-warning">Nueva Especialidad</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tabla-especialidades" class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="display: none">ID</th>
                                    <th style="color: #fff">Nombre</th>
                                    <th style="color: #fff">Trayectos</th>
                                    <th style="color: #fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($especialidades as $especialidad)
                                        <tr>
                                            <td style="display: none">{{ $especialidad->id }}</td>
                                            <td>{{ $especialidad->Nombre }}</td>
                                            <td>{{ $especialidad->Trayectos }}</td>
                                            
                                            <td>
                                                @can('editar')
                                                <a href="{{ route('especialidades.edit', $especialidad->id) }}" class="btn btn-info">Editar</a>
                                                @endcan
                                                @can('borrar')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['especialidades.destroy', $especialidad->id], 'style' => 'display:inline']) !!}
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
        $('#tabla-especialidades').DataTable();

        setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 5000);
    });
</script>
@endpush