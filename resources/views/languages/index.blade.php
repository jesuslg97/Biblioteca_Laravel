@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_language')}}</h1>
            </div>

            <div class="col-md-12 mt-2">
                <h4>Buscador por campo</h4>
            </div>

            <form action="{{route('languages.index')}}" method="post">
                <div class="row col-md-12">
                    @csrf
                    <div class="col-md-6 mb-2">
                        <input id="languageName" name="languageName" class="form-control"
                               value="@isset($languageName) {{$languageName}} @endisset" placeholder="{{__('string.search_language_name_placeholder')}}" />
                    </div>

                    <div class="col-md-6 mb-2">
                        <input id="isoCode" name="isoCode" class="form-control"
                               value="@isset($isoCode) {{$isoCode}} @endisset" placeholder="{{__('string.search_language_iso_placeholder')}}" />
                    </div>

                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                    </div>

                </div>
            </form>

            <br>
            <div class="col-md-4 form-inline mb-2">
                <h4>Buscador avanzado</h4>
                <form action="{{route('languages.find')}}" method="post">
                    @csrf
                    <input id="languageFind" name="languageFind" class="form-control"
                           value="@isset($languageFind) {{$languageFind}} @endisset" placeholder="{{__('string.search_language_placeholder')}}" />
                           <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                </form>
            </div>

            <div class="col-12">
                @if(count($languages) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                        <th>{{__('string.id_header')}}</th>
                        <th>{{__('string.name_header')}}</th>
                        <th>{{__('string.language_ISO')}}</th>
                        <th colspan="2">{{__('string.actions_header')}}</th>
                        </thead>

                        <tbody>
                            @foreach($languages as $language)
                                <tr>
                                    <td>{{$language->id}}</td>
                                    <td>{{$language->name}}</td>
                                    <td>{{$language->ISO_code}}</td>

                                    <td>
                                        <a class="btn btn-success" href="{{ route('languages.edit', $language) }}">Editar</a>

                                        <form id="delete-form-{{ $language->id }}" action="{{ route('languages.delete', [$language]) }}"
                                          method="post" style="display: inline-block">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" onclick = "return confirm('¿Realmente desea eliminar? Se borrará la posibilidad de escuchar y ver subtitulada la serie en ese idioma.')">
                                                {{__('string.delete_btn')}}</button>
                                        </form>
                                    </td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning mt-2" role="alert">
                        Aún no existen idiomas.
                    </div>
                @endif
            </div>

            <div class="row my-3 pr-3">
                <div class="col">
                    <div class="float-right">
                        @if($languages instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$languages->links()}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mb-2">
                <a class ="header__link btn btn-primary" href="{{route('languages.create')}}">
                    {{__('string.create_language')}}<i class="fas fa-plus"></i></a>
                <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
            </div>

        </div>
    </div>
@endsection
