@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_director')}}</h1>
            </div>

            <div class="offset-md-4 col-4 mt-3">
                <form name="create_director" action="{{ route('directors.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="directorName" class="form-label">{{__('string.director_name')}}</label>
                        <input id="directorName" name="directorName" type="text"
                               placeholder="{{__('string.director_name')}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="directorSurname" class="form-label">{{__('string.director_surname')}}</label>
                        <input id="directorSurname" name="directorSurname" type="text"
                               placeholder="{{__('string.director_surname')}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="directorDate" class="form-label">{{__('string.director_date')}}</label>
                        <input id="directorDate" name="directorDate" type="date"
                               placeholder="{{__('string.director_date')}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="directorNationality" class="form-label">{{__('string.director_nationality')}}</label>
                        <br>
                        <select name="directorNationality" id="directorNationality" class="form-select" aria-label="Default select example">
                            <option selected>Elige una nacionalidad</option>
                            @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                            @endforeach
                        </select>
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
