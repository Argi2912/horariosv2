@extends('layouts.app')
@section('title')
    Inicio
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card ">
                                        <div class="card-body px-4 py4-5">
                                            <div class="row">
                                                <div class="col-md-4 d-flex justify-content-start">
                                                    <div class="stats-icon mb-2">
                                                        <i class=" fas fa-building"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">
                                                        Profesores
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">@php
                                                        echo count($profesores);
                                                    @endphp</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card ">
                                        <div class="card-body px-4 py4-5">
                                            <div class="row">
                                                <div class="col-md-4 d-flex justify-content-start">
                                                    <div class="stats-icon mb-2">
                                                        <i class=" fas fa-newspaper"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">
                                                        Materias
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">@php
                                                        echo count($materias);
                                                    @endphp</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 col-md-6">
                                    <div class="card ">
                                        <div class="card-body px-4 py4-5">
                                            <div class="row">
                                                <div class="col-md-4 d-flex justify-content-start">
                                                    <div class="stats-icon mb-2">
                                                        <i class=" fas fa-fire"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 ">
                                                    <h6 class="text-muted font-semibold">
                                                        Aulas
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">@php
                                                        echo count($aulas);
                                                    @endphp</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                 
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/chartjs.min.js') }}"></script>
   
@endsection
