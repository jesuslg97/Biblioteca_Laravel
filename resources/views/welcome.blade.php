@extends('layouts.main')

@section('title')
    {{__('string.home_title')}}
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('string.home_title')}}</h1>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Plataformas</h5>
                                        <p class="card-text">Listado y gestion de las plataformas creadas en la BBDD</p>
                                        <a class="btn btn-primary" href="{{route('platforms.index')}}">Listado de plataformas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Directores</h5>
                                        <p class="card-text">Listado y gestion de las directores creadas en la BBDD</p>
                                        <a class="btn btn-primary" href="{{route('directors.index')}}">Listado de directores</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Actores</h5>
                                        <p class="card-text">Listado y gestion de las actores creadas en la BBDD</p>
                                        <a class="btn btn-primary" href="{{route('actors.index')}}">Listado de actores</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Idiomas</h5>
                                        <p class="card-text">Listado y gestion de las idiomas creadas en la BBDD</p>
                                        <a class="btn btn-primary" href="{{route('languages.index')}}">Listado de idiomas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Nacionalidades</h5>
                                        <p class="card-text">Listado y gestion de las nacionalidades creadas en la BBDD</p>
                                        <a class="btn btn-primary" href="{{route('nationalities.index')}}">Listado de nacionalidades</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="col-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Series</h5>
                                        <p class="card-text">Listado y gestion de las series creadas en la BBDD</p>
                                        <a class="btn btn-primary" href="{{route('series.index')}}">Listado de series</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
