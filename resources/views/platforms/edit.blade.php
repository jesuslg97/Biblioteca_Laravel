@extends('layouts.main')

@section('title')
{{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.edit_platform')}}</h1>
            </div>

            <div class="offset-md-4 col-4 mt-3">
                <form name="create_platform" action="{{ route('platforms.update',$platform) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="platformName" class="form-label">{{__('string.platform_name')}}</label>
                        <input id="platformName" name="platformName" type="text"
                               placeholder="{{__('string.platform_name')}}" class="form-control" value="{{$platform->name}}" required>
                    </div>

                    <div class="col-12 text-center mb-2">
                        <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                        <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
