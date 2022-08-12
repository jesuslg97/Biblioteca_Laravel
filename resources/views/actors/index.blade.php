@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_actor')}}</h1>
            </div>

            <div class="col-md-12 mt-2">
                <h4>Buscador por campo</h4>
            </div>

            <form action="{{route('actors.index')}}" method="post">
                <div class="row col-md-12">
                    @csrf
                    <div class="col-md-6 mb-2">
                        <input id="actorName" name="actorName" class="form-control"
                               value="@isset($actorName) {{$actorName}} @endisset" placeholder="{{__('string.search_actor_name_placeholder')}}" />
                    </div>

                    <div class="col-md-6 mb-2">
                        <input id="actorSurname" name="actorSurname" class="form-control"
                               value="@isset($actorSurname) {{$actorSurname}} @endisset" placeholder="{{__('string.search_actor_surname_placeholder')}}" />
                    </div>

                    <div class="col-md-6 mb-2">
                        <input type ="date" id="actorDate" name="actorDate" class="form-control"
                               value="@isset($actorDate) {{$actorDate}} @endisset" placeholder="{{__('string.search_actor_date_placeholder')}}" />
                    </div>

                    <div class="col-md-6 mb-2">
                        <input id="actorNationality" name="actorNationality" class="form-control"
                               value="@isset($actorNationality) {{$actorNationality}} @endisset" placeholder="{{__('string.search_actor_nationality_placeholder')}}" />
                    </div>

                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                    </div>

                </div>
            </form>

            <div class="col-md-4 form-inline mb-2">
                <h4>Buscador avanzado</h4>
                <form action="{{route('actors.find')}}" method="post">
                    @csrf
                    <input id="actorFind" name="actorFind" class="form-control"
                           value="@isset($actorFind) {{$actorFind}} @endisset" placeholder="{{__('string.search_actor_placeholder')}}" />
                           <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                </form>
            </div>

            <div class="col-12">
                @if(count($actors) > 0)
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
                            @foreach($actors as $actor)
                                <tr>
                                    <td>{{$actor->id}}</td>
                                    <td>{{$actor->name}}</td>
                                    <td>{{$actor->surname}}</td>
                                    <td>{{date('d/m/Y', strtotime($actor->date))}}</td>
                                    <td>
                                        @foreach($nationalities as $nationality)
                                            @if($actor->nationality == $nationality->id)
                                                {{ $nationality->name}}
                                           @endif
                                       @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('actors.edit', $actor) }}">Editar</a>

                                        <form id="delete-form-{{ $actor->id }}" action="{{ route('actors.delete', [$actor]) }}"
                                              method="post" style="display: inline-block">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" onclick = "return confirm('¿Realmente desea eliminar? Se borrará su asociación a cualquier serie a la que pertenezca.')">
                                                {{__('string.delete_btn')}}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning mt-2" role="alert">
                        Aún no existen actores.
                    </div>
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

            <div class="col-12 text-center mb-2">
                <a class ="header__link btn btn-primary" href="{{route('actors.create')}}">
                    {{__('string.create_actor')}}<i class="fas fa-plus"></i></a>
                <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
            </div>

        </div>
    </div>
@endsection
