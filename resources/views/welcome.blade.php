@extends('layouts.main')

@section('title')
    {{__('string.home_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>Biblioteca de plataformas</h1>
            </div>

            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title"><strong>Plataformas</strong></h5>
                            <p class="card-text">Listado y gestión de las plataformas creadas en BBDD.</p>
                            <a class="btn btn-primary" href="{{route('platforms.index')}}">Listado de plataformas</a>
                        </div>
                    </div>
                </div>

                <div class="col-4 m-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title"><strong>Directores/as</strong></h5>
                            <p class="card-text">Listado y gestión de los directores/as creados en BBDD.</p>
                            <a class="btn btn-primary" href="{{route('directors.index')}}">Listado de directores/as</a>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title"><strong>Actores y actrices</strong></h5>
                            <p class="card-text">Listado y gestión de los actores y actrices creados en BBDD.</p>
                            <a class="btn btn-primary" href="{{route('actors.index')}}">Listado de actores y actrices</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex align-items-center justify-content-center mt-3">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title"><strong>Idiomas</strong></h5>
                            <p class="card-text">Listado y gestión de los idiomas creados en BBDD.</p>
                            <a class="btn btn-primary" href="{{route('languages.index')}}">Listado de idiomas</a>
                        </div>
                    </div>
                </div>

                <div class="col-4 m-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title"><strong>Series</strong></h5>
                            <p class="card-text">Listado y gestión de las series creadas en BBDD.</p>
                            <a class="btn btn-primary" href="{{route('series.index')}}">Listado de series</a>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title"><strong>Nacionalidades</strong></h5>
                            <p class="card-text">Listado y gestión de los nacionalidades creadas en BBDD.</p>
                            <a class="btn btn-primary" href="{{route('nationalities.index')}}">Listado de nacionalidades</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
