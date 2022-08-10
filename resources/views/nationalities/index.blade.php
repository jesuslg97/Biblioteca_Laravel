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
                        <h1>{{__('string.list_title_nationality')}}</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class ="header__link btn btn-success" href="{{route('nationalities.create')}}">
                                {{__('string.create_nationality')}}<i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <input id="nationalityName" name="nationalityName" class="form-control"
                                   value="@isset($nationalityName) {{$nationalityName}} @endisset" placeholder="{{__('string.search_nationality_name_placeholder')}}" />
                        </form>
                    </div>
                    <div class="table-responsive mt-3">
                        @if(count($nationalities) > 0)
                            <table class="table table-striped align-items-center">
                                <thead>
                                <th>{{__('string.id_header')}}</th>
                                <th>{{__('string.name_header')}}</th>
                                <th>{{__('string.actions_header')}}</th>
                                </thead>
                                <tbody>
                                @foreach($nationalities as $nationality)
                                    <tr>
                                        <td>
                                            {{$nationality->id}}
                                        </td>

                                        <td>
                                            {{$nationality->name}}
                                        </td>

                                        <td>
                                            <a class="btn btn-success" href="{{ route('nationalities.edit', $nationality) }}">
                                                Editar
                                            </a>

                                            <form id="delete-form-{{ $nationality->id }}"
                                                  action="{{ route('nationalities.delete', [$nationality]) }}"
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
                                @if($nationalities instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$nationalities->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
