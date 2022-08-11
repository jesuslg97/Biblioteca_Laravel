@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_serie')}}</h1>
            </div>

            <div class="col-md-4 form-inline">
                <form action="" method="post">
                    @csrf
                    <input id="serieTitle" name="serieTitle" class="form-control"
                           value="@isset($serieTitle) {{$serieTitle}} @endisset" placeholder="{{__('string.search_serie_title_placeholder')}}" />
                    <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                </form>
            </div>

            <div class="col-12">
                @if(count($series) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                            <th>{{__('string.id_header')}}</th>
                            <th>{{__('string.title_header')}}</th>
                            <th>{{__('string.platform_header')}}</th>
                            <th>{{__('string.director_header')}}</th>
                            <th>{{__('string.actor_header')}}</th>
                            <th>{{__('string.audio_header')}}</th>
                            <th>{{__('string.subtitle_header')}}</th>
                            <th colspan="2">{{__('string.actions_header')}}</th>
                        </thead>

                        <tbody>
                            @foreach($series as $serie)
                                <tr>
                                    <td>{{$serie->id}}</td>
                                    <td>{{$serie->title}}</td>
                                    <td>
                                        @foreach($platforms as $platform)
                                            @if($platform->id == $serie->platform)
                                                {{$platform->name}}
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        @foreach($directors as $director)
                                            @if($director->id == $serie->director)
                                                {{$director->name}} {{$director->surname}}
                                           @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        <ul>
                                            @foreach($serie->serieActors as $serieActor)
                                                <li> {{$serieActor->actor->name}} {{$serieActor->actor->surname}}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>
                                        <ul>
                                            @foreach($serie->serieLanguages as $serieLanguage)
                                                @if($serieLanguage->tipo == 0)
                                                    <li> {{$serieLanguage->language->name}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>
                                        <ul>
                                            @foreach($serie->serieLanguages as $serieLanguage)
                                                @if($serieLanguage->tipo == 1)
                                                    <li> {{$serieLanguage->language->name}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>
                                        <a class="btn btn-success" href="{{ route('series.edit', $serie) }}">Editar</a>

                                        <form id="delete-form-{{ $serie->id }}" action="{{ route('series.delete', [$serie]) }}"
                                          method="post" style="display: inline-block">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">{{__('string.delete_btn')}}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning mt-2" role="alert">
                        Aún no existen series.
                    </div>
                @endif
            </div>

            <div class="row my-3 pr-3">
                <div class="col">
                    <div class="float-right">
                        @if($series instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$series->links()}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mb-2">
                <a class ="header__link btn btn-primary" href="{{route('series.create')}}">
                    {{__('string.create_serie')}}<i class="fas fa-plus"></i></a>
                <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
            </div>

        </div>
    </div>
@endsection
