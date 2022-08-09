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
                        <h1>{{__('string.edit_director')}}</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form name="create_director" action="{{ route('directors.update',$director) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="directorName" class="form-label">{{__('string.director_name')}}</label>
                                <input id="directorName" name="directorName" type="text"
                                       placeholder="{{__('string.director_name')}}" class="form-control" value="{{$director->name}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="directorSurname" class="form-label">{{__('string.director_surname')}}</label>
                                <input id="directorSurname" name="directorSurname" type="text"
                                       placeholder="{{__('string.director_surname')}}" class="form-control" value="{{$director->surname}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="directorDate" class="form-label">{{__('string.director_date')}}</label>
                                <input id="directorDate" name="directorDate" type="date"
                                       placeholder="{{__('string.director_surname')}}" class="form-control" value="{{$director->date}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="directorNationality" class="form-label">{{__('string.director_nationality')}}</label>
                                <input id="directorNationality" name="directorNationality" type="text"
                                       placeholder="{{__('string.director_nationality')}}" class="form-control" value="{{$director->nationality}}" required>
                            </div>

                            <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
