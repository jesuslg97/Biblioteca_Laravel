@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_director')}}</h1>
            </div>

            <div class="col-md-4 form-inline">
                <form action="" method="post">
                    @csrf
                    <input id="directorName" name="directorName" class="form-control"
                           value="@isset($directorName) {{$directorName}} @endisset" placeholder="{{__('string.search_director_name_placeholder')}}" />
                    <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                </form>
            </div>

            <div class="col-12">
                @if(count($directors) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                            <th>{{__('string.id_header')}}</th>
                            <th>{{__('string.name_header')}}</th>
                            <th>{{__('string.surname_header')}}</th>
                            <th>{{__('string.date_header')}}</th>
                            <th>{{__('string.nationality_header')}}</th>
                            <th colspan="2">{{__('string.actions_header')}}</th>
                        </thead>

                        <tbody>
                            @foreach($directors as $director)
                                <tr>
                                    <td>{{$director->id}}</td>
                                    <td>{{$director->name}}</td>
                                    <td>{{$director->surname}}</td>
                                    <td>{{$director->date}}</td>
                                    <td>
                                        @foreach($nationalities as $nationality)
                                            @if($director->nationality == $nationality->id)
                                                {{ $nationality->name}}
                                           @endif
                                       @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('directors.edit', $director) }}">Editar</a>

                                        <form id="delete-form-{{ $director->id }}" action="{{ route('directors.delete', [$director]) }}"
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
                        Aún no existen directores.
                    </div>
                @endif
            </div>

            <div class="row my-3 pr-3">
                <div class="col">
                    <div class="float-right">
                        @if($directors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$directors->links()}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mb-2">
                <a class ="header__link btn btn-primary" href="{{route('directors.create')}}">
                    {{__('string.create_director')}}<i class="fas fa-plus"></i></a>
                <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
            </div>

        </div>
    </div>
@endsection
