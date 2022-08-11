@extends('layouts.main')

@section('title')
{{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_platform')}}</h1>
            </div>

            <div class="col-md-4 form-inline">
                <form action="{{route('platforms.index')}}" method="post">
                    @csrf
                    <input id="platformName" name="platformName" class="form-control"
                           value="@isset($platformName) {{$platformName}} @endisset" placeholder="{{__('string.search_platform_name_placeholder')}}" />
                    <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                </form>
            </div>

            <div class="col-12">
                @if(count($platforms) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                            <th>{{__('string.id_header')}}</th>
                            <th>{{__('string.name_header')}}</th>
                            <th colspan="2">{{__('string.actions_header')}}</th>
                        </thead>

                        <tbody>
                            @foreach($platforms as $platform)
                                <tr>
                                    <td>{{$platform->id}}</td>
                                    <td>{{$platform->name}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('platforms.edit', $platform) }}">Editar</a>

                                        <form id="delete-form-{{ $platform->id }}" action="{{ route('platforms.delete', [$platform]) }}"
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
                        Aún no existen plataformas.
                    </div>
                @endif
            </div>

            <div class="row my-3 pr-3">
                <div class="col">
                    <div class="float-right">
                        @if($platforms instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$platforms->links()}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mb-2">
                <a class ="header__link btn btn-primary" href="{{route('platforms.create')}}">
                    {{__('string.create_platform')}}<i class="fas fa-plus"></i></a>
                <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
            </div>

        </div>
    </div>
@endsection
