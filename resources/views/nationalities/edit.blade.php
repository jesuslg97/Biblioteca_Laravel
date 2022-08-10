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
                        <h1>{{__('string.edit_nationality')}}</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form name="create_nationality" action="{{ route('nationalities.update',$nationality) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nationalityName" class="form-label">{{__('string.nationality_name')}}</label>
                                <input id="nationalityName" name="nationalityName" type="text"
                                       placeholder="{{__('string.nationality_name')}}" class="form-control" value="{{$nationality->name}}" required>
                            </div>
                            <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
