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
                        <h1>{{__('string.create_language')}}</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form name="create_language" action="{{ route('languages.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="languageName" class="form-label">{{__('string.language_name')}}</label>
                                <input id="languageName" name="languageName" type="text"
                                       placeholder="{{__('string.language_name')}}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="languageISO" class="form-label">{{__('string.language_ISO')}}</label>
                                <input id="languageISO" name="languageISO" type="text"
                                       placeholder="{{__('string.language_ISO')}}" class="form-control" required>
                            </div>

                            <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
