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
                    <h1>{{__('string.edit_platform')}}</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <form name="create_platform" action="{{ route('platforms.update',$platform) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <h3 for="platformName" class="form-label">{{__('string.platform_name')}}</h3>
                            <input id="platformName" name="platformName" type="text"
                                placeholder="{{__('string.platform_name')}}" class="form-control" value="{{$platform->name}}" required>
                        </div>
                        <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection