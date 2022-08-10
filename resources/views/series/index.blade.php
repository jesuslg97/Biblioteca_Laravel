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
                        <h1>{{__('string.list_title_serie')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class ="header__link btn btn-success" href="{{route('series.create')}}">
                                {{__('string.create_serie')}}<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="serieTitle" name="serieTitle" class="form-control"
                                   value="@isset($serieTitle) {{$serieTitle}} @endisset" placeholder="{{__('string.search_serie_title_placeholder')}}" />
                        </form>
                    </div>

                    <div class="table-responsive mt-3">
                        @if(count($series) > 0)
                            <table class="table table-striped align-items-center">
                                <thead>
                                <th>{{__('string.id_header')}}</th>
                                <th>{{__('string.title_header')}}</th>
                                <th>{{__('string.platform_header')}}</th>
                                <th>{{__('string.director_header')}}</th>
                                <th>{{__('string.actor_header')}}</th>
                                <th>{{__('string.audio_header')}}</th>
                                <th>{{__('string.subtitle_header')}}</th>
                                <th>{{__('string.actions_header')}}</th>
                                </thead>
                                <tbody>
                                @foreach($series as $serie)
                                    <tr>
                                        <td>
                                            {{$serie->id}}
                                        </td>

                                        <td>
                                            {{$serie->title}}
                                        </td>

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
                                            <a class="btn btn-success" href="{{ route('series.edit', $serie) }}">
                                                Editar
                                            </a>

                                            <form id="delete-form-{{ $serie->id }}"
                                                  action="{{ route('series.delete', [$serie]) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
