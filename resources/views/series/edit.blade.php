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
                        <h1>{{__('string.edit_serie')}}</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form name="create_serie" action="{{ route('series.update',$serie) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="serieTitle" class="form-label">{{__('string.serie_title')}}</label>
                                <input id="serieTitle" name="serieTitle" type="text"
                                       placeholder="{{__('string.serie_title')}}" class="form-control" value="{{$serie->title}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="seriePlatform" class="form-label">{{__('string.serie_platform')}}</label>
                                <input id="seriePlatform" name="seriePlatform" type="text"
                                       placeholder="{{__('string.serie_platform')}}" class="form-control" value="{{$serie->platform}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="serieDirector" class="form-label">{{__('string.serie_director')}}</label>
                                <input id="serieDirector" name="serieDirector" type="date"
                                       placeholder="{{__('string.serie_director')}}" class="form-control" value="{{$serie->director}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="serieActors" class="form-label">{{__('string.serie_actors')}}</label>
                                <input id="serieActors" name="serieActosr" type="text"
                                       placeholder="{{__('string.serie_actors')}}" class="form-control" value="{{$serie->actors}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="serieAudios" class="form-label">{{__('string.serie_audios')}}</label>
                                <input id="serieAudios" name="serieAudios" type="date"
                                       placeholder="{{__('string.serie_audios')}}" class="form-control" value="{{$serie->audios}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="serieSubtitles" class="form-label">{{__('string.serie_subtitles')}}</label>
                                <input id="serieSubtitles" name="serieSubtitles" type="text"
                                       placeholder="{{__('string.serie_subtitles')}}" class="form-control" value="{{$serie->subtitle}}" required>
                            </div>

                            <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
