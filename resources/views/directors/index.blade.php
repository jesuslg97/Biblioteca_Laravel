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
                        <h1>{{__('string.list_title')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class ="header__link btn btn-success" href="{{route('directors.create')}}">
                                {{__('string.create_director')}}<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="directorName" name="directorName" class="form-control"
                                   value="@isset($directorName) {{$directorName}} @endisset" placeholder="{{__('strings.search_director_name_placehorder')}}" />
                        </form>
                    </div>

                    <div class="table-responsive mt-3">
                        @if(count($directors) > 0)
                            <table class="table table-striped align-items-center">
                                <thead>
                                    <th>{{__('string.id_header')}}</th>
                                    <th>{{__('string.name_header')}}</th>
                                    <th>{{__('string.surname_header')}}</th>
                                    <th>{{__('string.date_header')}}</th>
                                    <th>{{__('string.nationality_header')}}</th>
                                    <th>{{__('string.actions_header')}}</th>
                                </thead>
                                <tbody>
                                @foreach($directors as $director)
                                    <tr>
                                        <td>
                                            {{$director->id}}
                                        </td>

                                        <td>
                                            {{$director->name}}
                                        </td>

                                        <td>
                                            {{$director->surname}}
                                        </td>

                                        <td>
                                            {{$director->date}}
                                        </td>

                                        <td>
                                            {{$director->nationality}}
                                        </td>

                                        <td>
                                            <a class="btn btn-success" href="{{ route('directors.edit', $director) }}">
                                                Editar
                                            </a>

                                            <form id="delete-form-{{ $director->id }}"
                                                  action="{{ route('directors.delete', [$director]) }}"
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
                                @if($directors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$directors->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
