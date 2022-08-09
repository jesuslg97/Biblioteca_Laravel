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
                            <a class ="header__link btn btn-success" href="{{route('actors.create')}}">
                                {{__('string.create_actor')}}<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="actorName" name="actorName" class="form-control"
                                   value="@isset($actorName) {{$actorName}} @endisset" placeholder="{{__('strings.search_actor_name_placehorder')}}" />
                        </form>
                    </div>

                    <div class="table-responsive mt-3">
                        @if(count($actors) > 0)
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
                                @foreach($actors as $actor)
                                    <tr>
                                        <td>
                                            {{$actor->id}}
                                        </td>

                                        <td>
                                            {{$actor->name}}
                                        </td>

                                        <td>
                                            {{$actor->surname}}
                                        </td>

                                        <td>
                                            {{$actor->date}}
                                        </td>

                                        <td>
                                            {{$actor->nationality}}
                                        </td>

                                        <td>
                                            <a class="btn btn-success" href="{{ route('actors.edit', $actor) }}">
                                                Editar
                                            </a>

                                            <form id="delete-form-{{ $actor->id }}"
                                                  action="{{ route('actors.delete', [$actor]) }}"
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
                                @if($actors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$actors->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
