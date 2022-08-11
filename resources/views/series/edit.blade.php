@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.edit_serie')}}</h1>
            </div>

            <form name="create_serie" action="{{ route('series.update',$serie) }}" method="post">
                @csrf
                <div class="row col-12">

                    <div class="col-4 mt-3">
                        <label for="serieTitle" class="form-label">{{__('string.serie_title')}}</label>
                        <input id="serieTitle" name="serieTitle" type="text"
                               placeholder="{{__('string.serie_title')}}" class="form-control" value="{{$serie->title}}" required>
                    </div>

                    <div class="col-4 mt-3">
                        <label for="seriePlatform" class="form-label">{{__('string.serie_platform')}}</label>
                        <br>
                        <select name="seriePlatform" id="seriePlatform" class="form-select" aria-label="Default select example">

                            @foreach($platforms as $platform)
                                @if($platform->id == $serie->platform)
                                    <option selected value="{{$platform->id}}">{{$platform->name}}</option>
                                @else
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mt-3">
                        <label for="serieDirector" class="form-label">{{__('string.serie_director')}}</label>
                        <br>
                        <select name="serieDirector" id="serieDirector" class="form-select" aria-label="Default select example">

                            @foreach($directors as $director)
                                @if($director->id == $serie->director)
                                    <option selected value="{{$director->id}}">{{$director->name}} {{$director->surname}}</option>
                                @else
                                    <option value="{{$director->id}}">{{$director->name}} {{$director->surname}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mt-3">
                        <label for="serieActors" class="form-label">{{__('string.serie_actors')}}</label>
                        <br>
                        <select name="serieActors[]" multiple id="serieActors" class="form-select" aria-label="Default select example">
                            @foreach($actors as $actor)
                                @php($existActor = false)
                                @foreach($serie->serieActors as $serieActor)
                                    @if($actor->id == $serieActor->actor_id)
                                        @php($existActor = true)
                                    @endif
                                @endforeach

                                @if($existActor)
                                    <option selected value="{{$actor->id}}">{{$actor->name}} {{$actor->surname}}</option>
                                @else
                                    <option  value="{{$actor->id}}">{{$actor->name}} {{$actor->surname}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mt-3">
                        <label for="serieAudios" class="form-label">{{__('string.serie_audios')}}</label>
                        <br>
                        <select name="serieAudios[]" multiple id="serieAudios" class="form-select" aria-label="Default select example">
                            @foreach($languages as $language)
                                @php($existAudio = false)
                                @foreach($serie->serieLanguages as $serieLanguage)
                                    @if(($language->id == $serieLanguage->language_id) && $serieLanguage->tipo == 0)
                                        @php($existAudio = true)
                                    @endif
                                @endforeach

                                @if($existAudio)
                                    <option selected value="{{$actor->id}}">{{$language->name}}</option>
                                @else
                                    <option value="{{$actor->id}}">{{$language->name}} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mt-3">
                        <label for="serieSubtitles" class="form-label">{{__('string.serie_subtitles')}}</label>
                        <br>
                        <select name="serieSubtitles[]" multiple id="serieSubtitles" class="form-select" aria-label="Default select example">
                            @foreach($languages as $language)
                                @php($existAudio = false)
                                @foreach($serie->serieLanguages as $serieLanguage)
                                    @if(($language->id == $serieLanguage->language_id) && $serieLanguage->tipo == 1)
                                        @php($existAudio = true)
                                    @endif
                                @endforeach

                                @if($existAudio)
                                    <option selected value="{{$actor->id}}">{{$language->name}}</option>
                                @else
                                    <option value="{{$actor->id}}">{{$language->name}} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 text-center mb-2">
                    <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                    <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection
