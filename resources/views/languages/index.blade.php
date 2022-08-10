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
                        <h1>{{__('string.list_title_language')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class ="header__link btn btn-success" href="{{route('languages.create')}}">
                                {{__('string.create_language')}}<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="actorName" name="actorName" class="form-control"
                                   value="@isset($languageName) {{$languageName}} @endisset" placeholder="{{__('string.search_language_name_placeholder')}}" />
                        </form>
                    </div>

                    <div class="table-responsive mt-3">
                        @if(count($languages) > 0)
                            <table class="table table-striped align-items-center">
                                <thead>
                                <th>{{__('string.id_header')}}</th>
                                <th>{{__('string.name_header')}}</th>
                                <th>{{__('string.ISOcode_header')}}</th>
                                <th>{{__('string.actions_header')}}</th>
                                </thead>
                                <tbody>
                                @foreach($languages as $language)
                                    <tr>
                                        <td>
                                            {{$languages->id}}
                                        </td>

                                        <td>
                                            {{$languages->name}}
                                        </td>

                                        <td>
                                            {{$languages->ISOcode}}
                                        </td>

                                        <td>
                                            <a class="btn btn-success" href="{{ route('languages.edit', $language) }}">
                                                Editar
                                            </a>

                                            <form id="delete-form-{{ $language->id }}"
                                                  action="{{ route('languages.delete', [$language]) }}"
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
                                @if($languages instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$languages->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
