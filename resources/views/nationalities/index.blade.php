@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_nationality')}}</h1>
            </div>

            <div class="col-md-4 form-inline">
                <form action="" method="post">
                    @csrf
                    <input id="nationalityName" name="nationalityName" class="form-control"
                           value="@isset($nationalityName) {{$nationalityName}} @endisset" placeholder="{{__('string.search_nationality_name_placeholder')}}" />
                    <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                </form>
            </div>

            <div class="col-12">
                @if(count($nationalities) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                            <th>{{__('string.id_header')}}</th>
                            <th>{{__('string.name_header')}}</th>
                            <th colspan="2">{{__('string.actions_header')}}</th>
                        </thead>

                        <tbody>
                            @foreach($nationalities as $nationality)
                                <tr>
                                    <td>{{$nationality->id}}</td>
                                    <td>{{$nationality->name}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('nationalities.edit', $nationality) }}">Editar</a>

                                        <form id="delete-form-{{ $nationality->id }}" action="{{ route('nationalities.delete', [$nationality]) }}"
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
                        Aún no existen nacionalidades.
                    </div>
                @endif
            </div>

            <div class="row my-3 pr-3">
                <div class="col">
                    <div class="float-right">
                        @if($nationalities instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$nationalities->links()}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mb-2">
                <a class ="header__link btn btn-primary" href="{{route('nationalities.create')}}">
                    {{__('string.create_nationality')}}<i class="fas fa-plus"></i></a>
                <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
            </div>

        </div>
    </div>
@endsection
