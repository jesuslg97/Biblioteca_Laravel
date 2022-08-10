@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('string.create_serie')}}</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form name="create_serie" action="{{ route('series.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="serieTitle" class="form-label">{{__('string.serie_title')}}</label>
                                <input id="serieTitle" name="serieTitle" type="text"
                                       placeholder="{{__('string.serie_title')}}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="seriePlatform" class="form-label">{{__('string.serie_platform')}}</label>
                                </br>
                                <select name="seriePlatform" id="seriePlatform" class="form-select" aria-label="Default select example">
                                <option selected>Elige una plataforma</option>    
                                    @foreach($platforms as $platform)
                                        <option value="{{$platform->id}}">{{$platform->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="serieDirector" class="form-label">{{__('string.serie_director')}}</label>
                                </br>
                                <select name="serieDirector" id="serieDirector" class="form-select" aria-label="Default select example">
                                <option selected>Elige un director</option>    
                                    @foreach($directors as $director)
                                        <option value="{{$director->id}}">{{$director->name}} {{$director->surname}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="serieActors" class="form-label">{{__('string.serie_actors')}}</label>
                                </br>
                                <select name="serieActors[]" multiple id="serieActors" class="form-select" aria-label="Default select example">
                                    @foreach($actors as $actor)
                                        <option value="{{$actor->id}}">{{$actor->name}} {{$actor->surname}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="serieAudios" class="form-label">{{__('string.serie_audios')}}</label>
                                </br>
                                <select name="serieAudios[]" multiple id="serieAudios" class="form-select" aria-label="Default select example">
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="serieSubtitles" class="form-label">{{__('string.serie_subtitles')}}</label>
                                </br>
                                <select name="serieSubtitles[]" multiple id="serieSubtitles" class="form-select" aria-label="Default select example">
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
