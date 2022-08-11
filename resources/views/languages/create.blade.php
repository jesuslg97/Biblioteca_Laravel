@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_language')}}</h1>
            </div>

            <div class="offset-md-4 col-4 mt-3">
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

                    <div class="col-12 text-center mb-2">
                        <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
                        <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
