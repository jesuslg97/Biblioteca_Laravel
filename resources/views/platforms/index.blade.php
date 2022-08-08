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
                        <a class ="header__link btn btn-success" href="{{route('platforms.create')}}">
                        {{__('string.create_platform')}}<i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <form action="" method="post">
                        @csrf
                        <input id="platformName" name="platformName" class="form-control" 
                        value="@isset($platformName) {{$platformName}} @endisset" placeholder="{{__('strings.search_platform_name_placehorder')}}" />
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    @if(count($platforms) > 0)
                        <table class="table table-striped align-items-center">
                            <thead>
                                <th>{{__('string.id_header')}}</th>
                                <th>{{__('string.name_header')}}</th>
                                <th>{{__('string.actions_header')}}</th>
                            </thead>
                            <tbody>
                            @foreach($platforms as $platform)
                                <tr>
                                    <td>
                                        {{$platform->id}}
                                    </td>

                                    <td>
                                        {{$platform->name}}
                                    </td>

                                    <td>
                                    <button type="submit" class="btn btn-success">{{__('string.editar_btn')}}</button>

                                        <form id="delete-form-{{ $platform->id }}"
                                                action="{{ route('platforms.delete', [$platform]) }}"
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
                                @if($platforms instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{$platforms->links()}}
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection