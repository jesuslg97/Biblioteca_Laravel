@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_nationality')}}</h1>
            </div>

            <div class="offset-md-4 col-4 mt-3">
                <form name="create_nationality" action="{{ route('nationalities.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nationalityName" class="form-label">{{__('string.nationality_name')}}</label>
                        <input id="nationalityName" name="nationalityName" type="text"
                               placeholder="{{__('string.nationality_name')}}" class="form-control" required>
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
